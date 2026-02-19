# How To Solve the Challenge

Considerations expected
- Participants come across a website showing information about recording information of lifeforms
- The website references its routing in multiple places: "Observe the profiles using our experimental routing:" and "Lifeform Cataloging via PATH_INFO vectored conveyance"
- Analysis of the code in AuthMiddleware.php shows that the application is vulnerable to a PATH_INFO Authorization Bypass, reference for this: (https://symfony.com/blog/cve-2025-64500-incorrect-parsing-of-path-info-can-lead-to-limited-authorization-bypass)


## Solving steps for the challenge

- Step 1: Based on the code, the check for /admin uri in path info and the normalization happen in the wrong order. So something like /index.phpadmin/dashboard/ bypasses the auth and normalizes to /index.php/admin/dashboard, thus rendering the dashboard for access
- Step 2: This gives participants a filesystem management tool which has a limited set of commands, ls, mkdir and tee
- Step 3: The tee command allows them to write files anywhere on the server, so getting code execution is possible. But to be able to access a file that router.php actually executes is important. Or you could just write the index.php cause that runs no matter what
- Step 4: Use something like `<?php system($_REQUEST['cmd']); ?>`, to then do a request with this: `/index.php?cmd=cat path/to/flag.txt` and get the flag