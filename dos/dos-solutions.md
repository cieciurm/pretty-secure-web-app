# DoS solutions

## Info

### RequestReadTimeout directive

Allows to limit the time a client may take to send the request.

### TimeOut directive

* Should be lowered on sites that are subject to DoS attacks.

* Setting this to as low as a few seconds may be appropriate.

### KeepAliveTimeout directive

* May be also lowered on sites that are subject to DoS attacks.

* Some sites even turn off the keepalives completely via KeepAlive, which has of course other drawbacks on performance.

### Directives LimitRequestBody, LimitRequestFields, LimitRequestFieldSize, LimitRequestLine

Should be carefully configured to limit resource consumption triggered by client input.

### MaxRequestWorkers directive

To allow the server to handle the maximum number of simultaneous connections without running out of resources.

## Example

    RequestReadTimeout 5
    TimeOut 10
    KeepAliveTimeout 10
    MaxRequestWorkers 10

## Source:

[Apache HTTPd - Security Tips](https://httpd.apache.org/docs/trunk/misc/security_tips.html)
