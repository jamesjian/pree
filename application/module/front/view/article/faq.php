<?php
if ($faqs) {
    foreach ($faqs as $faq) {
        echo $faq['title'];
        echo $faq['description'];
    }
}


