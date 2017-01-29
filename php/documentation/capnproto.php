<?php
echo <<<_END
<div id="docpane">
    <h2>Capnproto</h2>
    <h3>Overview</h3>
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

    <h3>Message Structure</h3>
    <p>
        The capnproto message definiton can by found on the official
        <a href="https://github.com/hamersaw/proddle/blob/master/capnproto/proddle.capnp">
        github</a> page. The structure is intended to be self-explanitory.
    </p>
</div>
_END;
?>
