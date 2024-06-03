<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combined Tasks</title>
    <style>
        #text { color: blue; }
        #menu { width: 200px; height: 100%; background-color: #333; position: fixed; top: 0; left: -200px; transition: 0.3s; }
        #menu a { color: white; padding: 10px; display: block; text-decoration: none; }
        #image { position: relative; left: 0; width: 150px; height: 150px; transition: left 0.5s, width 0.5s, height 0.5s; }
        #image:hover { width: 300px; height: 300px; }
        #box { width: 100px; height: 100px; background-color: blue; position: absolute; top: 50px; left: 50px; transition: all 1s; }
    </style>
    <script>
        function showMessage() {
            const userInput = document.getElementById('userInput').value;
            alert('You entered: ' + userInput);
        }
        function changeColor() {
            document.getElementById('text').style.color = 'red';
        }
        function toggleMenu() {
            const menu = document.getElementById('menu');
            if (menu.style.left === '-200px') {
                menu.style.left = '0';
            } else {
                menu.style.left = '-200px';
            }
        }
        function moveImage() {
            const img = document.getElementById('image');
            img.style.left = img.style.left === '200px' ? '0' : '200px';
        }
        function moveBox() {
            const box = document.getElementById('box');
            box.style.top = Math.random() * window.innerHeight + 'px';
            box.style.left = Math.random() * window.innerWidth + 'px';
        }
        setInterval(moveBox, 1000); // Move the box every second
        function changeText() {
            document.getElementById('dynamicText').innerHTML = 'Text has been changed!';
        }
        setTimeout(changeText, 3000); // Change text after 3 seconds
    </script>
</head>
<body>
    <h1>Task 1: Display Message Box</h1>
    <input type="text" id="userInput" placeholder="Enter some text">
    <button onclick="showMessage()">Show Message</button>

    <h1>Task 2: Change Text Color</h1>
    <p id="text" onmouseover="changeColor()">Hover over or click the button to change my color.</p>
    <button onclick="changeColor()">Change Color</button>

    <h1>Task 3: Change Text After Interval</h1>
    <p id="dynamicText">This text will change after 3 seconds.</p>

    <h1>Task 4: Sliding Menu</h1>
    <div id="menu">
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
    </div>
    <button onclick="toggleMenu()">Toggle Menu</button>

    <h1>Task 5: Move Image Horizontally</h1>
    <img id="image" src="https://via.placeholder.com/150" alt="Placeholder Image">
    <button onclick="moveImage()">Move Image</button>

    <h1>Task 6: Change Image Size on Mouse Over</h1>
    <img id="imageHover" src="https://via.placeholder.com/150" alt="Placeholder Image">

    <h1>Task 7: Dynamic Moving Box</h1>
    <div id="box"></div>
</body>
</html>
