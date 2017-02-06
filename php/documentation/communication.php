<?php
echo <<<_END
<div id="docpane">
    <h2>Communication</h2>
    <h3>Capnproto</h3>
    <p>
        <a href="https://capnproto.org/">Capnproto</a> is an "insanely
        fast data interchange format" as described on their page. It is
        a similar concept to Google's Protobufs (and actually designed
        by the same developer). It works like this, a capnproto file
        is created with message definitions. Separate compilers are
        available (for most languages) to compile the capnproto file 
        into native code. An application is then able to import the
        generated file and read and write any of the capnproto messages
        defined. Therefore, capnproto provides a langauge agnostic 
        interface for data exchange. An additional layer has been
        developed to allow RPC (remote procedure calls) using capnproto
        defined messages. 
    </p>

    <p>
        Proddle leverages this tool to define all communication between
        the server and vantage applications. Currently, all components
        are developed in a single languages (Mozilla's Rust), but we can
        forsee situations where compatability between languages is useful.
    </p>

    <p>
        The capnproto message definiton for Proddle can by found on the official
        <a href="https://github.com/hamersaw/proddle/blob/master/capnproto/proddle.capnp">
        github</a> page. The structure is intended to be self-explanitory.
    </p>

    <h3>Overview</h3>    
    <p>
        The communcation between vantage and server can be categorized into
        three actions.
    </p>

    <ul>
        <li>Get Measurements</li>
        <li>Get Operations</li>
        <li>Send Results</li>
    </ul>

    <h3>Get Measurements</h3>
    <p>
        Get measurement communication acts as follows. The vantage sends a
        list of measurement names and versions to the server. Using this
        list the server constructs a diff with the information in MongoDB.
        For all new measurements (or new measurement versions), all fields 
        are provided. In the case where a vantage has a measurement that 
        is no longer present in MongoDB a measurement name with a version 
        of '0' is sent.
    </p>

    <h3>Get Operations</h3>
    <p>
        The vast quantities of operations require a separate protocol
        to decrease message size and message frequency. Therefore, vantage
        side, operations are stored in buckets that are determined by 
        hashing the domain of the operation. In addition to the 
        operation contents, a bucket hash value is computed over all
        operations contained in that bucket. An example is provided
        below (note: components have been simplified).
    </p>

    <p>
        Suppose we have the following operations.
    </p>

    <pre>
        op1: {"Domain":"google.com", "Interval":14400, "Measurement": "http-get"}
        op2: {"Domain":"amazon.com", "Interval":14400, "Measurement": "http-get"}
        op3: {"Domain":"yahoo.com", "Interval":14400, "Measurement": "http-get"}
    </pre>

    <p>
        And for the hash function h(), which computes over the hash space 0-9, we have.
    </p>

    <pre>
        h(op1): 2
        h(op2): 3
        h(op3): 8
    </pre>

    <p>
        Then if we have two buckets over the hashspace of equal size. The first 
        bucket (b1) will contain the hash values 0-4 and the second bucket (b2) 
        5-9. Using a separate hash function g() we compute the bucket hash of 
        the two buckets.
    </p>

    <pre>
        b1 = [op1, op2]
        b2 = [op3]

        g(b1) = 1
        g(b2) = 3
    </pre>

    <p>
        Each time the vantage requests to get new operations it sends the bucket
        intervals and the hashes of those buckets. Server side, we are then
        able to iterate over all operations and compute the same hashes over
        the same size buckets. If there is a difference in bucket hash values
        we add all of the operations contained in the offending bucket to
        they reply. If the bucket hash values do not differ we need not include
        any information in the reply. Vantage side, we are then able to replace 
        the values in buckets recieved to obtain all new/updated operations.
    </p>

    <h3>Send Results</h3>
    <p>
        The send results functionality is much less complex. A list of
        result JSON strings are sent to the server. The server simply 
        connects to the MongoDB cluster and inserts the data.
    </p>
</div>
_END;
?>
