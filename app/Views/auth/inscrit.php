<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href ="https://codepen.io/finnhvman/pen/bmNdNr.css">
<style>
    /* Material Customization */
:root {
    --pure-material-primary-rgb: 255, 191, 0;
    --pure-material-onsurface-rgb: 0, 0, 0;
}

body {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background: url("https://res.cloudinary.com/finnhvman/image/upload/v1541930411/pattern.png");
}

.registration {
    position: relative;
    border-radius: 8px;
    padding: 16px 48px;
    box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
    overflow: hidden;
    background-color: white;
}

h1 {
    margin: 32px 0;
    font-family: "Roboto", "Segoe UI", BlinkMacSystemFont, system-ui, -apple-system;
    font-weight: normal;
    text-align: center;
}

.registration > label {
    display: block;
    margin: 24px 0;
    width: 320px;
}

a {
    color: rgb(var(--pure-material-primary-rgb));
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

button {
    display: block !important;
    margin: 32px auto;
    position: relative;
    display: inline-block;
    box-sizing: border-box;
    border: none;
    border-radius: 4px;
    padding: 0 16px;
    min-width: 64px;
    height: 36px;
    vertical-align: middle;
    text-align: center;
    text-overflow: ellipsis;
    text-transform: uppercase;
    color: rgb(var(--pure-material-onprimary-rgb, 255, 255, 255));
    background-color: rgb(var(--pure-material-primary-rgb, 33, 150, 243));
    box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
    font-family: var(--pure-material-font, "Roboto", "Segoe UI", BlinkMacSystemFont, system-ui, -apple-system);
    font-size: 14px;
    font-weight: 500;
    line-height: 36px;
    overflow: hidden;
    outline: none;
    cursor: pointer;
    transition: box-shadow 0.2s;
}

.done,
.progress {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: white;
    visibility: hidden;
}

.done {
    transition: visibility 0s 1s;
}

.signed > .done {
    visibility: visible;
}

.done > a {
    display: inline-block;
    text-decoration: none;
}

.progress {
    opacity: 0;
}

.signed > .progress {
    animation: loading 4s;
}

@keyframes loading {
    0% {
        visibility: visible;
    }
    12.5% {
        opacity: 0;
    }
    25% {
        opacity: 1;
    }
    87.5% {
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}

.left-footer,
.right-footer {
    position: fixed;
    padding: 14px;
    bottom: 14px;
    color: #555;
    background-color: #eee;
    font-family: "Roboto", "Segoe UI", BlinkMacSystemFont, system-ui, -apple-system;
    font-size: 14px;
    line-height: 1.5;
    box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}

.left-footer {
    left: 0;
    border-radius: 0 4px 4px 0;
    text-align: left;
}

.right-footer {
    right: 0;
    border-radius: 4px 0 0 4px;
    text-align: right;
}

.left-footer > a,
.right-footer > a {
    color: black;
}

.left-footer > a:hover,
.right-footer > a:hover {
    text-decoration: underline;
}

</style>

</head>
<body>
<form class="registration" action="<?= base_url('auth') ?>" method="POST">
<?= csrf_field() ?>

  <h1>👋 Inscription!</h1>

  <label class="pure-material-textfield-outlined">
  <span>Adresse Email</span>
     <input type="email" name="email" required value="<?= old('email') ?>">
      
  </label>
  <label class="pure-material-textfield-outlined">
  <span>Mot de passe </span>
    <input type="password" id="password" name="password" required>
    
  </label>
       

  <button class="pure-material-button-contained" type="submit">Inscription</button>

  <div class="done">
    <h1>👌 You're all set!</h1>
    <a class="pure-material-button-text" href="javascript:window.location.reload(true)">Again</a>
  </div>
  <div class="progress">
    <progress class="pure-material-progress-circular" />
  </div>
</form>


           

       
   
</body>
</html>
