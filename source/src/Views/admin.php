<h1>Admin Dashboard - File Manager</h1>

<p>Welcome to the admin file management system. You have limited command execution capabilities for managing the public directory.</p>

<?php if (!empty($error)): ?>
    <div class="error"><?php echo htmlspecialchars($error); ?></div>
<?php endif; ?>

<?php if (!empty($output)): ?>
    <div style="background: #f0f0f0; padding: 15px; border-radius: 3px; margin: 15px 0;">
        <strong>Command Output:</strong>
        <pre style="margin: 10px 0; white-space: pre-wrap;"><?php echo htmlspecialchars($output); ?></pre>
    </div>
<?php endif; ?>

<h2>Available Commands</h2>

<div style="margin: 20px 0;">
    <h3>1. List Files (ls)</h3>
    <p>List all files and directories in the filesystem folder</p>
    <form method="POST" action="/admin/execute">
        <input type="hidden" name="command" value="ls">
        <button type="submit">Execute ls</button>
    </form>
</div>

<div style="margin: 20px 0;">
    <h3>2. Create Directory (mkdir)</h3>
    <p>Create a new subdirectory in filesystem/</p>
    <form method="POST" action="/admin/execute">
        <input type="hidden" name="command" value="mkdir">
        <label>Directory name:</label>
        <input type="text" name="args" placeholder="mydir" required>
        <button type="submit">Execute mkdir</button>
    </form>
</div>

<div style="margin: 20px 0;">
    <h3>3. Write File (tee)</h3>
    <p>Write content to a file in filesystem/. Format: <code>filename|content</code></p>
    <form method="POST" action="/admin/execute">
        <input type="hidden" name="command" value="tee">
        <label>Filename and content:</label>
        <input type="text" name="args" placeholder="info.txt|Hello World" required style="width: 100%;">
        <small>Separate filename and content with a pipe (|) character</small><br>
        <button type="submit" style="margin-top: 10px;">Execute tee</button>
    </form>
</div>
