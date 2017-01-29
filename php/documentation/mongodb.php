<?php
echo <<<_END
<div id="docpane">
    <h2>MongoDB</h2>
    <h3>Overview</h3>
    <p>
        MongoDB is an established project that breaks the chains 
        of traditional SQL databases by providing a searchable JSON
        document store. Official documentation can be found on the
        official <a href="https://www.mongodb.com/">MongoDB</a> website.
        Our use case consists of multiple clusters of MongoDB instances
        where each cluster holds a complete replica of the data. Within
        each cluster, data is sharded over a number of machines. This
        setup provides the strongest failure resistance.
        We are strong supporters of the project and chose it as the
        backend for this project for a number of reasons.
    </p>

    <ul>
        <li>Native data replication and sharding.</li>
        <li>Unstructured document storage</li>
    </ul>

    <p>
        Like many modern NoSQL databases MongoDB provides data
        replication and sharding. Replication refers to storing
        duplicate instances of the data to provide a fault tollerant
        system. Sharding refers to storing different subsets of the
        data on different machines. Sharding is a common approach to
        provide a scale-out system where additional machines can be
        added to the system to improve performance.
    </p>

    <p>
        The defining characteristic, if there is one, of MongoDB is
        the JSON document storage system. Perhaps the most intuitive
        approach to describing this paradigm is by comparrison to
        traditional SQL databases. MongoDB uses 'documents' instead
        of 'records' to store rows of data. A document is a JSON
        object that has no set data fields. MongoDB provides 
        'collections' that are analogous to 'tables'. Documents are 
        stored in collections similar to the way records are stored 
        in rows. The main difference between traditional SQL and
        MongoDB is that a collection is able to store documents with
        different fields, all while providing an interface to query
        the data. This attribute is paramount to our project since
        measurements return results that have drastically different
        fields.
    </p>

    <h3>Measurements</h3>
    <p>
        The fields comprising a measurement in MongoDB are as follows.
    </p>

    <ul>
        <li>Timestamp - Creation timestamp in seconds since epoch.</li>
        <li>Name - The measurement name.</li>
        <li>Version - Version of the measurement (used to allow updates to measurements).</li>
        <li>Dependencies - Pip package dependencies.</li>
        <li>Content - Python3 definition script content.</li>
    </ul>

    <p>
        A measurement JSON object could look like this.
    </p>

    <pre>
        {
            "timestamp" : 1485549359,
            "name" : "http-get",
            "version" : 1,
            "dependencies" : [ "pycurl" ],
            "content" : "omitted for length purposes"
        }
    </pre>

    <h3>Operations</h3>
    <p>
        An operation is defined as performing a measurement on a
        domain at a certain time interval. The fields are defined
        as follows.
    </p>

    <ul>
        <li>Timestamp - Creation timestamp in seconds since epoch.</li>
        <li>Measurement - Name of measurement to be performed.</li>
        <li>Domain - Domain to perform measurement on.</li>
        <li>Interval - Interval at which to schedule measurement in seconds.</li>
        <li>Tags - A set of tags to allow vantages to include/exclude particular operations.</li>
    </ul>

    <p>
        An operation JSON object could look like this.
    </p>

    <pre>
        {
            "timestamp" : 1485549371,
            "measurement" : "http-get",
            "domain" : "google.com",
            "interval" : 14400,
            "tags" : [ "unlimited", "http" ]
        }
    </pre>

    <h3>Results</h3>
    <p>
        A result is the JSON output when a measurement is performed.
        Each measurement result is annotated with specific fields that
        are uniform to all measurments. The specific architecture is 
        explained in more depth in the
        <a href="documentation.html?page=measurements">measurements</a>
        section. The fields provided for all measurements are as follows.
    </p>

    <ul>
        <li>Timestamp - Execution timestamp in seconds since epoch.</li>
        <li>Domain - Domain the measurement was executed on.</li>
        <li>Error - Boolean value if server side error occurs.</li>
        <li>ErrorMessage - Message describing error (only present if Error field is true).</li>
        <li>Hostname - Hostname of vantage that executed measurement.</li>
        <li>IpAddress - Ip address of vantage that executed measurement.</li>
        <li>Measurement - Name of measurement.</li>
        <li>Result - JSON object output by measurement</li>
    </ul>

    <p>
        A result JSON object could look like this.
    </p>

    <pre>
        {
            "Timestamp" : 1485577638,
            "Domain" : "google.com",
            "Error" : false,
            "Hostname" : "proddle.netsec.colostate.edu",
            "IpAddress" : "129.82.138.69",
            "Measurement" : "http-get",
            "Result" : { omitted for length reasons }
        }
    </pre>
</div>
_END;
?>
