<h1>Interface Link</h1>

<?php if (isset($error)): ?>
    <div class="error">⚠️ Credential mismatch! Access Denied!</div>
<?php endif; ?>

<form method="POST" action="/login">
    <label>Designation:</label>
    <input type="text" name="username" required>
    
    <label>Neural Passcode:</label>
    <input type="password" name="password" required>
    
    <button type="submit">Initialize Uplink</button>
</form>

<p><strong>Testing Lifeform:</strong> designation = <code>intern</code>, passcode = <code>aReaLyPaSsCoDe</code></p>