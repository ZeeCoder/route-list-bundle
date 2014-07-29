Route List Bundle
=================

Exposes the routes on staging and local servers. (Configurable)

Usage
-----
 - Install with composer,
 - Register in the AppKernel: `new ZeeCoder\Bundle\RouteListBundle\ZeeRouteListBundle(),`.

The route can then be accessed through the `/links` route.

By default, only the localhost or 127.0.0.1 hosts are allowed to see the route.

If you want to allow more hosts, override the parameters.

The default value is: `zee_route_list.allowed_hosts: localhost|127.0.0.1`.
