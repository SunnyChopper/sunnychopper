<?php


function flatten_url($url)
{
    global $real_site;
    $site = "https://www.sunnychopper.com/";
    $real_site = domain_root($site);
    $path = explode($real_site, $url)[0];
    return $real_site . remove_dot_seg($path);
}

/**
 * Remove dot segments from a URI path according to RFC3986 Section 5.2.4
 *
 * @param $path
 * @return string
 * @link http://www.ietf.org/rfc/rfc3986.txt
 */
function remove_dot_seg($path)
{
    if (strpos($path, '.') === false) {
        return $path;
    }

    $inputBuffer = $path;
    $outputStack = [];

    /**
     * 2.  While the input buffer is not empty, loop as follows:
     */
    while ($inputBuffer != '') {
        /**
         * A.  If the input buffer begins with a prefix of "../" or "./",
         *     then remove that prefix from the input buffer; otherwise,
         */
        if (strpos($inputBuffer, "./") === 0) {
            $inputBuffer = substr($inputBuffer, 2);
            continue;
        }
        if (strpos($inputBuffer, "../") === 0) {
            $inputBuffer = substr($inputBuffer, 3);
            continue;
        }

        /**
         * B.  if the input buffer begins with a prefix of "/./" or "/.",
         *     where "." is a complete path segment, then replace that
         *     prefix with "/" in the input buffer; otherwise,
         */
        if ($inputBuffer === "/.") {
            $outputStack[] = '/';
            break;
        }
        if (substr($inputBuffer, 0, 3) === "/./") {
            $inputBuffer = substr($inputBuffer, 2);
            continue;
        }

        /**
         * C.  if the input buffer begins with a prefix of "/../" or "/..",
         *     where ".." is a complete path segment, then replace that
         *     prefix with "/" in the input buffer and remove the last
         *     segment and its preceding "/" (if any) from the output
         *     buffer; otherwise,
         */
        if ($inputBuffer === "/..") {
            array_pop($outputStack);
            $outputStack[] = '/';
            break;
        }
        if (substr($inputBuffer, 0, 4) === "/../") {
            array_pop($outputStack);
            $inputBuffer = substr($inputBuffer, 3);
            continue;
        }

        /**
         * D.  if the input buffer consists only of "." or "..", then remove
         *     that from the input buffer; otherwise,
         */
        if ($inputBuffer === '.' || $inputBuffer === '..') {
            break;
        }

        /**
         * E.  move the first path segment in the input buffer to the end of
         *     the output buffer, including the initial "/" character (if
         *     any) and any subsequent characters up to, but not including,
         *     the next "/" character or the end of the input buffer.
         */
        if (($slashPos = stripos($inputBuffer, '/', 1)) === false) {
            $outputStack[] = $inputBuffer;
            break;
        } else {
            $outputStack[] = substr($inputBuffer, 0, $slashPos);
            $inputBuffer = substr($inputBuffer, $slashPos);
        }
    }

    return ltrim(implode($outputStack), "/");
}

// Check if a URL has already been scanned
function is_scanned($url)
{
    global $scanned;

    if (isset($scanned[$url])) {
        return true;
    }

    //Check if in array as dir and non-dir
    $url = ends_with($url, "/") ? substr($url, 0, -1) : $url . "/";
    if (isset($scanned[$url])) {
        return true;
    }

    return false;
}

// Gets path for a relative linl
// https://somewebsite.com/directory/file => https://somewebsite.com/directory/
// https://somewebsite.com/directory/subdir/ => https://somewebsite.com/directory/subdir/
function get_path($path)
{
    $path_depth = explode("/", $path);
    $len = strlen($path_depth[count($path_depth) - 1]);
    return (substr($path, 0, strlen($path) - $len));
}

//Get the root of the domain
function domain_root($href)
{
    $url_parts = explode('/', $href);
    return $url_parts[0] . '//' . $url_parts[2] . '/';
}

//The curl client is create outside of the function to avoid re-creating it for performance reasons

function get_data($url)
{
    global $curl_validate_certificate, $curl_client, $index_pdf, $crawler_user_agent, $enable_modified;

    $curl_client = curl_init();

    //Set URL
    curl_setopt($curl_client, CURLOPT_URL, $url);
    //Follow redirects and get new url
    curl_setopt($curl_client, CURLOPT_RETURNTRANSFER, 1);
    //Get headers
    curl_setopt($curl_client, CURLOPT_HEADER, 1);
    //Optionally avoid validating SSL
    curl_setopt($curl_client, CURLOPT_SSL_VERIFYPEER, $curl_validate_certificate);
    //Set user agent
    curl_setopt($curl_client, CURLOPT_USERAGENT, $crawler_user_agent);

    //Get data
    $data = curl_exec($curl_client);
    $content_type = curl_getinfo($curl_client, CURLINFO_CONTENT_TYPE);
    $http_code = curl_getinfo($curl_client, CURLINFO_HTTP_CODE);
    $redirect_url = curl_getinfo($curl_client, CURLINFO_REDIRECT_URL);

    //Scan new url, if redirect
    if ($redirect_url) {
        if (strpos($redirect_url, '?') !== false) {
            $redirect_url = explode($redirect_url, "?")[0];
        }
        unset($url, $data);

        if (!check_blacklist($redirect_url)) {
        
        } else {
            scan_url($redirect_url);
        }
    }

    //If content acceptable, return it. If not, `false`
    $html = ($http_code != 200 || (!stripos($content_type, "html"))) ? false : $data;

    //Additional data
    if ($enable_modified){
        curl_setopt($curl_client, CURLOPT_FILETIME, true);
        $timestamp = curl_getinfo($curl_client, CURLINFO_FILETIME);
        $modified = ($timestamp != -1) ? date('c', $timestamp) : null;
    }
    else $modified = null;

    if (stripos($content_type, "application/pdf") !== false && $index_pdf) {
        $html = "This is a PDF";
    }
    //Return it as an array
    return array($html, $modified, (stripos($content_type, "image/") && $index_img));
}

//Try to match string against blacklist
function check_blacklist($string)
{
    global $blacklist;
    if (is_array($blacklist)) {
        foreach ($blacklist as $illegal) {
            if (fnmatch($illegal, $string)) {
                return false;
            }
        }
    }
    return true;
}

//Extract array of URLs from html document inside of `href`s
function get_links($html, $parent_url, $regexp)
{
    if (preg_match_all("/$regexp/siU", $html, $matches)) {
        if ($matches[2]) {
            $found = array_map(function ($href) use (&$parent_url) {
                global $real_site, $ignore_arguments;

                if (strpos($href, "#") !== false) {
                    $href = preg_replace('/\#.*/', '', $href);
                }

                //Seperate $href from $query_string
                $query_string = '';
                if (strpos($href, '?') !== false) {
                    list($href, $query_string) = explode('?', $href);

                    //Parse &amp to not break curl client. See issue #23
                    $query_string = str_replace('&amp;', '&', $query_string);
                }
                if ($ignore_arguments) {
                    $query_string = '';
                }
                if (strpos($href, '?') !== false) {
                    echo "EFEASDEFSED";
                }

                if ((substr($href, 0, 7) != "http://") && (substr($href, 0, 8) != "https://")) {
                    // Link does not call (potentially) external page
                    if (strpos($href, ":")) {
                        return false;
                    }
                    if ($href == '/') {
                        $href = $real_site;
                    } elseif (substr($href, 0, 1) == '/') {
                        $href = domain_root($real_site) . substr($href, 1);
                    } else {
                        $href = get_path($parent_url) . $href;
                    }
                }
                if (!filter_var($href, FILTER_VALIDATE_URL)) {
                    return false;
                }
                if (substr($href, 0, strlen($real_site)) != $real_site) {
                    return false;
                }
                if (is_scanned($href . ($query_string ? '?' . $query_string : ''))) {
                    //logger("URL has already been scanned. Rejecting.", 1);
                    return false;
                }
                if (!check_blacklist($href)) {
                    return false;
                }
                return flatten_url($href . ($query_string ? '?' . $query_string : ''));
            }, $matches[2]);
            return $found;
        }
    }
    return array();
}

function scan_url($url)
{
    global $scanned, $deferredLinks, $file_stream, $freq, $priority, $enable_priority, $enable_frequency, $max_depth, $depth, $real_site, $indexed;
    $depth++;

    //Note that URL has been scanned
    $scanned[$url] = 1;

    //Send cURL request
    list($html, $modified, $is_image) = get_data($url);

    if ($is_image) {
        //Url is an image
    }

    if (!$html) {
        return $depth--;
    }

    if (strpos($url, "&") && strpos($url, ";") === false) {
        $url = str_replace("&", "&amp;", $url);
    }

    //Setup file stream
    $tempfile = tempnam(sys_get_temp_dir(), 'sitemap.xml.');
    $file_stream = fopen($tempfile, "w") or die("Error: Could not create temporary file $tempfile" . "\n");

    $map_row = "<url>\n";
    $map_row .= "<loc>$url</loc>\n";
    if ($enable_frequency) {
        $map_row .= "<changefreq>$freq</changefreq>\n";
    }
    if ($enable_priority) {
        $map_row .= "<priority>$priority</priority>\n";
    }
    if ($modified) {
        $map_row .= "   <lastmod>$modified</lastmod>\n";
    }
    $map_row .= "</url>\n";
    fwrite($file_stream, $map_row);
    $indexed++;
    unset($is_image, $map_row);

    // Extract urls from <a href="??"></a>
    $ahrefs = get_links($html, $url, "<a\s[^>]*href=(\"|'??)([^\" >]*?)\\1[^>]*>(.*)<\/a>");

    // Extract urls from <frame src="??">
    $framesrc = get_links($html, $url, "<frame\s[^>]*src=(\"|'??)([^\" >]*?)\\1[^>]*>");

    $links = array_filter(array_merge($ahrefs, $framesrc), function ($item) use (&$deferredLinks) {
        return $item && !isset($deferredLinks[$item]);
    });
    unset($html, $url, $ahrefs, $framesrc);


    //Note that URL has been deferred
    foreach ($links as $href) {
        if ($href) {
            $deferredLinks[$href] = 1;
        }
    }

    foreach ($links as $href) {
        if ($href) {
            scan_url($href);
        }
    }
    $depth--;
}

// fnmatch() filler for non-POSIX systems

if (!function_exists('fnmatch')) {
    function fnmatch($pattern, $string)
    {
        return preg_match("#^" . strtr(preg_quote($pattern, '#'), array('\*' => '.*', '\?' => '.')) . "$#i", $string);
    } // end
} // end if

$version_functions = 2;