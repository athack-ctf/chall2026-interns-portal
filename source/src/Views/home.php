<h1>Welcome to the Intern's First Portal</h1>

<p>This biological lifeform data-site was constructed by an intern technician from Sector 7-G for their internship project.</p>

<h2>Manifest</h2>
<ul>
    <li>Universal Identity Verification</li>
    <li>Lifeform Cataloging via PATH_INFO vectored conveyance</li>
    <li>Overseer Chamber (Highly restricted)</li>
</ul>

<h2>Engage</h2>
<p>Observe the specimen profiles using our experimental routing:</p>
<ul>
    <li><a href="/index.php/users/1">Specimen #1</a></li>
    <li><a href="/index.php/users/2">Specimen #2</a></li>
</ul>

<p>Notes: As per instructions, the Overseer's controls are located at <code>/admin/dashboard</code>, but you have to be the 'High Overseer' for access (duh).</p>

<?php if (!isset($_SESSION['user'])): ?>
    <p><strong>Transmission:</strong> Use the provided testing credentials to interface!</p>
<?php endif; ?>