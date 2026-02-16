<style>
    .alien-barrier-icon {
        font-size: 80px;
        margin: 20px 0;
        display: inline-block;
        /* Initial neon glow */
        color: #00ff9d;
        text-shadow: 0 0 10px #00ff9d, 0 0 30px #ff00ea;
        /* Animation for rotation and color shifting */
        animation: alien-barrier-spin 3s infinite linear;
    }

    @keyframes alien-barrier-spin {
        0% { 
            transform: rotate(0deg); 
            filter: hue-rotate(0deg);
        }
        100% { 
            transform: rotate(360deg); 
            filter: hue-rotate(360deg);
        }
    }

    /* Keeping the red danger box style from the first version */
    .restricted-box {
        border: 3px dashed #ff4444;
        padding: 25px;
        background: rgba(255, 0, 0, 0.1);
        border-radius: 15px;
        text-align: left;
        box-shadow: inset 0 0 20px rgba(255, 0, 0, 0.2);
    }
    
    .intern-memo-title {
        color: #ff4444;
        font-weight: bold;
        margin-bottom: 10px;
        display: block;
    }

    .intern-note {
        margin-top: 20px;
        padding-top: 15px;
        border-top: 2px dotted #ff4444;
        color: #ff8888;
        font-family: monospace;
        font-size: 0.9em;
    }
</style>

<div style="text-align: center;">
    <span class="alien-barrier-icon">🖖</span>
    
    <h1 style="color: #ff4444; text-shadow: 0 0 10px #ff0000;">403: Access Denied</h1>
    
    <div class="restricted-box">
        <span class="intern-memo-title">System Message:</span>
        <p>Your current authorization token is not valid for this section.</p>
        <p>If you believe this is a mistake, please contact your local Sector Supervisor to update your credentials. (He is on vacation in Andromeda, so expect a wait time of a 1000 lightyears)</p>
        
        <div class="intern-note">
            <strong>Intern Memo:</strong> Sorry, I was told to keep this area locked down until the next solar cycle. I haven't set up the guest permissions yet, so the door stays shut for now. - The Intern
        </div>
    </div>

    <p style="margin-top: 30px;">
        <a href="/" style="color: #00ff9d; text-decoration: none; font-weight: bold; letter-spacing: 1px;">&larr; Return to Main Portal</a>
    </p>
</div>