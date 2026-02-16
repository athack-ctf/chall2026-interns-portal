<h1>Specimen Profile</h1>

<p><strong>Temporal ID:</strong> <?php echo htmlspecialchars($user['id']); ?></p>
<p><strong>Designation:</strong> <?php echo htmlspecialchars($user['username']); ?></p>

<p>This data is being pulled via the intern's custom router: <code>/index.php/users/<?php echo htmlspecialchars($user['id']); ?></code></p>