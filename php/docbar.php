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
        <li class="navdoc"><a href="documentation.html?page=communication">Communication</a></li>
    </ol>
</div>
_END;
?>
