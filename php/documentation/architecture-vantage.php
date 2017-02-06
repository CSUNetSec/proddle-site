<?php
echo <<<_END
<div id="docpane">
    <h2>Architecture Vantage</h2>
    <h3>Overview</h3>
    <p>
        Vantages serve to perform operations and relay results to a
        server. Communication between the vantage and server is defined
        further in the
        <a href="documentation?page=communication">communication</a> 
        section.
    </p>

    <h3>Measurement Execution Infrastructure</h3>
    <p>
        The measurement execution infrastructure is used to schedule
        operations to execute at their periodic interval. The concept
        is actually quite simple. Operations are stored in a sorted
        queue based on execution time. A thread periodically peeps at
        the head of this queue to determine if the next scheduled 
        operation should be executed. If an operation is scheduled to 
        execute, it is removed from the list, sent to a threadpool 
        to be executed, and placed back on the end of the queue 
        with an incremented next execution time. Once an operation
        is executed the framework collects the resulting JSON string.
        These strings are collected in batches and periodically sent
        back to the server for storage.
    </p>

    <h3>Configuration</h3>
    <p>
        Vantage configuration aims to allow for robust functionality.
        The available options are as follows.        
    </p>

    <ul>
        <li>Hostname - Vantage hostname to include in results.</li>
        <li>Ip Address- Vantage ip address to include in results.</li>
        <li>Measurements Directory - Storage location for measurement definitions.</li>
        <li>Bucket Count - Number of operation buckets.</li>
        <li>Thread Count - Number of threads for operation execution thread pool.</li>
        <li>Server Ip Address - Ip Address of Proddle server.</li>
        <li>Server Port - Port of Proddle server.</li>
        <li>Server Poll Interval Seconds - Number of seconds to periodically poll server for measurements/operations</li>
        <li>Result Batch Size - Maximum result batch size before sending to server.</li>
        <li>Include Tags - Include operations that contain these tags.</li>
        <li>Exclude Tags - Exclude operations that contain these tags.</li>
    </ul>
</div>
_END;
?>
