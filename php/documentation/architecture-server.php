<?php
echo <<<_END
<div id="docpane">
    <h2>Architecture Server</h2>
    <h3>Overview</h3>
    <p>
        The servers role is a lightweight bridge between vantages and
        the MongoDB backend cluster. The communication betwen server 
        and vantages has been documented extensively in the 
        <a href="documentation?page=communication">communication</a> 
        section.
    </p>

    <h3>Configuration</h3>
    <p>
        Server side configuration is currently quite simple, although
        additional operations are in the works. There are only a few
        parameterized arguments.
    </p>

    <ul>
        <li>MongoDB Ip Address - Ip Address of the MongoDB server.</li>
        <li>MongoDB Port - Port of the MongoDB server.</li>
        <li>Listen Ip Address - Ip Address to listen for vantages on.</li>
        <li>Listen Port - Port to listen for vantages on.</li>
    </ul>
</div>
_END;
?>
