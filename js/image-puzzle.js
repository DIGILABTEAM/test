// creating imagePuzzle object for  the entire game

var imagePuzzle = {

    stepCount: 0,

    startTime: new Date().getTime(), // setting timer

 // created a startgame object property for game functioning

    startGame: function (images, gridSize) {
                                 this.setImage(images, gridSize);
                                 helper.doc('gamePanel').style.display = 'block';
                                 helper.shuffle('sortable');
                                 this.stepCount;
                                 this.startTime 
                                 this.timer();
                                },


 // created a timer function for counting no of secs you have taken to complete the game

    timer: function () {
        var now = new Date().getTime();
        var elapsedTime = parseInt((now - imagePuzzle.startTime) / 1000, 10);
        helper.doc('timerPanel').textContent = elapsedTime;
        timerFunction = setTimeout(imagePuzzle.timer, 1000); 
        },                            

    
/* created a setImage method for diving the image in squares and shuffling ,sorting  and draging
*  and comparing with original image  
*/


    setImage: function (images, gridSize = 4) {
            var percentage = 100 / (gridSize - 1);
            var image = images[Math.floor(Math.random() * images.length)];
            helper.doc('imgTitle').innerHTML = image.title;
            helper.doc('actualImage').setAttribute('src', image.src);
            helper.doc('sortable').innerHTML = '';
            for (var i = 0; i < gridSize * gridSize; i++) {
                var xpos = (percentage * (i % gridSize)) + '%';
                var ypos = (percentage * Math.floor(i / gridSize)) + '%';
                //  console.log(xpos,ypos)
    
                let li = document.createElement('li');
                li.id = i;
                li.setAttribute('data-value', i);
                li.style.backgroundImage = 'url(' + image.src + ')';
                li.style.backgroundSize = (gridSize * 100) + '%';
                li.style.backgroundPosition = xpos + ' ' + ypos;
                li.style.width = 400 / gridSize + 'px';
                li.style.height = 400 / gridSize + 'px';
    
                li.setAttribute('draggable', 'true');
                li.ondragstart = (event) => event.dataTransfer.setData('data', event.target.id);
                li.ondragover = (event) => event.preventDefault();
                li.ondrop = (event) => {
                    let origin = helper.doc(event.dataTransfer.getData('data'));
                    let dest = helper.doc(event.target.id); // dest = destination
                    let p = dest.parentNode;                //p is a variable 
    
                    if (origin && dest && p) {
                        let temp = dest.nextSibling;
                        p.insertBefore(dest, origin);
                        p.insertBefore(origin, temp);
    
                        let vals = Array.from(helper.doc('sortable').children).map(x => x.id);
                        var now = new Date().getTime();
                        helper.doc('stepCount').textContent = ++imagePuzzle.stepCount;
                        document.querySelector('.timeCount').textContent = (parseInt((now - imagePuzzle.startTime) / 1000, 10));
    
                        if (isSorted(vals)) {
                            // helper.doc('actualImageBox').style.display = 'none';
                            //helper.doc('gameOver').style.display = 'block';
                            helper.doc('actualImageBox').innerHTML = helper.doc('gameOver').innerHTML;
                            helper.doc('stepCount').textContent = imagePuzzle.stepCount;
                        }
                    }
                };
                li.setAttribute('dragstart', 'true');
                helper.doc('sortable').appendChild(li);
            }
            helper.shuffle('sortable');
        }
    };

    // created isSorted variable so for checking whether it is sorted or not

    isSorted = (arr) => arr.every((elem, index) => { return elem == index; });


    //  created a helper object for easy and neat coding 

    var helper = {
        doc: (id) => document.getElementById(id) || document.createElement("div"),

    // created a shuffle method for shuffing the images 
        shuffle: (id) => {
            var ul = document.getElementById(id);
            for (var i = ul.children.length; i >= 0; i--) {
            ul.appendChild(ul.children[Math.random() * i | 0]);
            }
    }



 }