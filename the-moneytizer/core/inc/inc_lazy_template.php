<?php
$tag_html   = "<!DOCTYPE HTML>".PHP_EOL;
$tag_html   .= "<html>".PHP_EOL;
$tag_html   .= "<head>".PHP_EOL;
$tag_html   .= "</head>".PHP_EOL;
$tag_html   .= "<body>".PHP_EOL;
$tag_html   .= stripslashes($data->tag);
$tag_html   .= "</body>".PHP_EOL;
$tag_html   .= "</html>".PHP_EOL;

$tag_js  = "var jQuery_money = jQuery.noConflict();".PHP_EOL;
$tag_js .= "var delimiter = '$data->anchor';".PHP_EOL;
$tag_js .= "var i_height = $data->height + 20;".PHP_EOL;
$tag_js .= "var i_width = $data->width + 20;".PHP_EOL;
$tag_js .= "var i_frequency = $data->frequency;".PHP_EOL;
$tag_js .= "var i_order = '$data->order;'".PHP_EOL;
$tag_js .= "var i_anchors = jQuery_money(delimiter+'.tmzr-el').toArray()".PHP_EOL;
$tag_js .= "for(var j=$data->start;j<i_anchors.length;j+=i_frequency){".PHP_EOL;
$tag_js .= "    var i_container = document.createElement('div');".PHP_EOL;
$tag_js .= "    i_container.className = 'lazy-loading-container-$ad_id';".PHP_EOL;
$tag_js .= "    var i_node = document.createElement('iframe');".PHP_EOL;
$tag_js .= "    i_node.style.border = 'none'".PHP_EOL;
$tag_js .= "    i_node.setAttribute('loading','lazy')".PHP_EOL;
$tag_js .= "    i_node.setAttribute('scrolling','no')".PHP_EOL;
$tag_js .= "    i_node.className = 'lazy-loading-$ad_id';".PHP_EOL;
$tag_js .= "    i_node.src = ''".PHP_EOL;
$tag_js .= "    i_node.setAttribute('themoneytizer-lazy', '$src_iframe')".PHP_EOL;
$tag_js .= "    if(i_order=='before'){".PHP_EOL;
$tag_js .= "        i_anchors[j].before(i_container);".PHP_EOL;
$tag_js .= "    } else {".PHP_EOL;
$tag_js .= "        i_anchors[j].after(i_container);".PHP_EOL;    
$tag_js .= "    }".PHP_EOL;
$tag_js .= "    i_container.append(i_node);".PHP_EOL;
$tag_js .= "}".PHP_EOL;
$tag_js .= "const elementsList$ad_id = document.querySelectorAll('.lazy-loading-$ad_id');".PHP_EOL;
$tag_js .= "    const options$ad_id = {".PHP_EOL;
$tag_js .= "        root: null,".PHP_EOL;
$tag_js .= "        rootMargin: '0px',".PHP_EOL;
$tag_js .= "        threshold: 0,".PHP_EOL;
$tag_js .= "    };".PHP_EOL;
$tag_js .= "    const observer$ad_id = new IntersectionObserver(entries => {".PHP_EOL;
$tag_js .= "        entries.forEach(entry => {".PHP_EOL;
$tag_js .= "            if(entry.intersectionRatio > 0){".PHP_EOL;
$tag_js .= "                if(entry.target.getAttribute('themoneytizer-lazy-loaded') != 'loaded'){".PHP_EOL;
$tag_js .= "                    var i_src = entry.target.getAttribute('themoneytizer-lazy')".PHP_EOL;  
$tag_js .= "                    entry.target.setAttribute('src', i_src)".PHP_EOL;
$tag_js .= "                    entry.target.setAttribute('themoneytizer-lazy-loaded', 'loaded')".PHP_EOL;
$tag_js .= "                }".PHP_EOL;
$tag_js .= "            }".PHP_EOL;
$tag_js .= "        });".PHP_EOL;
$tag_js .= "    }, options$ad_id);".PHP_EOL;
$tag_js .= "    elementsList$ad_id.forEach(elt => {".PHP_EOL;
$tag_js .= "        observer$ad_id.observe(elt);".PHP_EOL;
$tag_js .= "    });".PHP_EOL;
$tag_js .= "jQuery_money('.lazy-loading-$ad_id').css('overflow', 'hidden')".PHP_EOL;
$tag_js .= "jQuery_money('.lazy-loading-$ad_id').css('width', i_width);".PHP_EOL;
$tag_js .= "jQuery_money('.lazy-loading-$ad_id').css('height', i_height);".PHP_EOL;
$tag_js .= "jQuery_money('.lazy-loading-container-$ad_id').css('overflow', 'hidden')".PHP_EOL;
$tag_js .= "jQuery_money('.lazy-loading-container-$ad_id').css('width', '100%');".PHP_EOL;
$tag_js .= "jQuery_money('.lazy-loading-container-$ad_id').css('min-height', i_height);".PHP_EOL;
$tag_js .= "jQuery_money('.lazy-loading-container-$ad_id').css('text-align', '$ad_align');".PHP_EOL;