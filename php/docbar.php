<?php
echo <<<_END
<div id="docbar">
    <ol class="navdoc">
        <li class="navdoc"><a href="documentation.html?page=introduction">Introduction</a></li>
        <li class="navdoc"><a href="documentation.html?page=measurements">Measurements</a></li>
        <li class="navdoc"><a href="documentation.html?page=mongodb">MongoDB</a></li>
        <li class="navdoc"><a href="documentation.html?page=architecture">Architecture</a>
            <ol class="navdoc">
                <li class="navdoc"><a href="documentation.html?page=architecture-server">Server</a></li>
                <li class="navdoc"><a href="documentation.html?page=architecture-vantage">Vantage</a></li>
                <li class="navdoc"><a href="documentation.html?page=architecture-yogi">Yogi</a></li>
            </ol>
        </li>
        <li class="navdoc"><a href="documentation.html?page=technologies">Technologies</a>
            <ol class="navdoc">
                <li class="navdoc"><a href="documentation.html?page=technologies-rust">Rust</a></li>
                <li class="navdoc"><a href="documentation.html?page=technologies-capnproto">Capnproto</a></li>
            </ol>
        </li>
    </ol>
</div>
_END;
?>
