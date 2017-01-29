<?php
echo <<<_END
<div id="docpane">
    <h2>Measurements</h2>
    <h3>Definition</h3>
    <p>
        The simple description is that measurements are defined as
        python scripts. This provides an unparalleled versatility
        in measuremnt capabilities. The infrastructure is currently
        restricted to python3. We don't see this as a limitation as
        measurements will likely be shorter than 50 lines. We allow
        scripts to use any package available through the
        <a href="https://pip.pypa.io/en/stable/">pip</a> python
        package manager. Python package management is handled as part
        of the <a href="documentation.html?page=architecture-vantage">
        vantage</a> code.
    </p>

    <h3>Execution</h3>
    <p>
        The measurement definition python script takes a single 
        argument, namely the domain to measure. Future work has
        already been planned to allow for additional parameters to be
        supplied, probably in the form of a JSON encoded string.
    </p>

    <h3>Result Format</h3>
    <p>
        We use JSON encoded strings as a storage structure for results.
        This provides the ability to analyze different measurement
        results with a single framework. There are <b>NO</b>
        requirements for result format besides being a valid JSON string.
        An example measurement for an HTTP GET request could results in
        the JSON string below.
    </p>

    <pre>
        {
            "ApplicationLayerLatency" : 0.07357000000000001,
            "DomainIp" : "216.58.217.36",
            "Error" : false,
            "HttpStatusCode" : 200,
            "RedirectCount" : 1
        }
    </pre>

    <p>
        The framework annotates a measurements JSON result with
        additional fields that are uniform to all measurements. This 
        simplifies measurement definitions. The additional fields are
        listed below.
    </p>

    <ul>
        <li>Timestamp - Execution timestamp in seconds since epoch.</li>
        <li>Domain - Domain the measurement was executed on.</li>
        <li>Error - Boolean value if server side error occurs.</li>
        <li>ErrorMessage - Message describing error (only present if Error field is true).</li>
        <li>Hostname - Hostname of vantage that executed measurement.</li>
        <li>IpAddress - Ip address of vantage that executed measurement.</li>
        <li>Measurement - Name of measurement.</li>
    </ul>

    <p>
        The result JSON described above is provided below with the
        additional fields provided by the vantage infrastructure.
    </p>

    <pre>
        {
            "Timestamp" : 1485577638,
            "Domain" : "google.com",
            "Error" : false,
            "Hostname" : "proddle.netsec.colostate.edu",
            "IpAddress" : "129.82.138.69",
            "Measurement" : "http-get",
            "Result" : {
                "ApplicationLayerLatency" : 0.07357000000000001,
                "DomainIp" : "216.58.217.36",
                "Error" : false,
                "HttpStatusCode" : 200,
                "RedirectCount" : 1
            }
        }
    </pre>
</div>
_END;
?>
