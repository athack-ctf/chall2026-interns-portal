<!DOCTYPE html>
<html>
<head>
    <title>Intern's Portal</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: radial-gradient(circle at center, #1a0b2e 0%, #050505 100%);
            color: #00ff9d;
        }
        nav {
            background: rgba(48, 10, 84, 0.6);
            padding: 10px 20px;
            margin-bottom: 30px;
            border-radius: 15px;
            border: 1px solid #7000ff;
            box-shadow: 0 0 15px #7000ff;
            backdrop-filter: blur(5px);
            /* Fixed: Added Flexbox for better alignment */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nav-links {
            display: flex;
            gap: 20px;
        }
        nav a {
            color: #00d9ff;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        nav a:hover {
            text-shadow: 0 0 10px #00d9ff;
            color: #fff;
        }
        /* Fixed: User area now stays grouped on the right */
        .user-controls {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .user-info {
            color: #ff00ea;
            white-space: nowrap;
        }
        .container {
            background: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 20px;
            border: 2px solid #00ff9d;
            box-shadow: inset 0 0 20px rgba(0, 255, 157, 0.2), 0 0 30px rgba(0, 255, 157, 0.1);
        }
        .error {
            background: rgba(255, 0, 0, 0.2);
            color: #ff4444;
            padding: 10px;
            border: 1px solid #ff4444;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px 0;
            background: #111;
            border: 1px solid #00ff9d;
            color: #00ff9d;
            border-radius: 10px;
        }
        button {
            background: linear-gradient(45deg, #7000ff, #ff00ea);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-weight: bold;
            box-shadow: 0 0 10px #ff00ea;
            /* Prevents the button from shrinking in the flex container */
            flex-shrink: 0;
        }
        button:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px #ff00ea;
        }
        .flag {
            background: linear-gradient(90deg, #00ff9d, #00d9ff);
            color: #000;
            padding: 20px;
            border-radius: 10px;
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
            border: 3px dashed #fff;
        }
        h1, h2 {
            color: #ff00ea;
            text-shadow: 2px 2px #300a54;
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-links">
            <a href="/">Mothership</a>
            <a href="/index.php/users/1">Lifeform #1</a>
            <a href="/index.php/users/2">Lifeform #2</a>
        </div>
        
        <div class="user-controls">
            <?php if (isset($_SESSION['user'])): ?>
                <span class="user-info">
                    Scanning: <?php echo htmlspecialchars($_SESSION['user']['username']); ?>
                    <?php if ($_SESSION['user']['is_admin']): ?>
                        (High Overseer)
                    <?php endif; ?>
                </span>
                <form method="POST" action="/logout" style="margin: 0;">
                    <button type="submit">Delink</button>
                </form>
            <?php else: ?>
                <a href="/login">Interface</a>
            <?php endif; ?>
        </div>
    </nav>

    <div class="container">
        <?php include $content; ?>
    </div>
</body>
</html>