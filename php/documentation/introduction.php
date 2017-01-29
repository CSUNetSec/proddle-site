<?php
echo <<<_END
<div id="docpane">
    <h2>Introduction</h2>
    <h3>Project Overview</h3>
    <p>
        A brief project overview has been given in the 
        <a href="index.html">home</a> section, alas, we'll 
        recover the topic here. This project collects versitile 
        network measurements from diverse geographic locations.
        The ultimate goal is to combine these measurements to 
        detect various network anomalies including DDoS.
    </p>

    <p>
        We are well aware of other projects that are using similar
        techniques, but we believe ours is unique for a few reasons.

        <ul>
            <li>Versatility of measurement definitions</li>
            <li>Publicly available dataset</li>
        </ul>
    </p>

    <p>
        By using python scripts to define measurements we provide
        extensive measurement options. This allows the infrastructure 
        to mimic current solutions by providing network level 
        measurements including ping, traceroute, etc. Our project 
        goes one step further to allow for application layer 
        measurements as well. For example we are able to provide
        a number of statistics based on HTTP GET requests. This is
        an interesting metric because it more closely reflects
        user experience than network level measurements which are 
        commonly routed different.
    </p>

    <p>
        All of the data collected is made publicly available. We
        believe the unique dataset will spur new and interesting
        research initaitives. Currently the data is stored in JSON
        format, but other formats can be provided upon request.
    </p>

    <h3>Documentation Structure</h3>
    <p>
        The aim of this documentation is to server as <b> THE
        AUTHORITY</b> on all things Proddle. We are strong believers 
        in a ground up approach. Therefore all attempts have been 
        made at introducing base elements of the system first and 
        progressing into the higher level architecture. It is our 
        hope that readers that are uninterested in the low level 
        details will be able to bypass the earlier sections and 
        still develop an intricate understanding of the system.
    </p>
</div>
_END;
?>
