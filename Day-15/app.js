// Selecting 
var addBtn = document.querySelector('.button-primary');
var tbody = document.getElementsByTagName('tbody');
// var title = document.querySelector('#title');
// var author = document.querySelector('#author');
// var isbn = document.querySelector('#isbn');
var inputs = document.getElementsByTagName('input');
var a = document.getElementsByTagName('a');


// Model
function Book (title,author,isbn){
    this.title = title;
    this.author = author;
    this.isbn = isbn;
}

Book.prototype.add = function (){
    var tr = document.createElement('tr');
    tr.innerHTML = ` <td>${this.title}</td> <td>${this.author}</td> <td>${this.isbn}</td> <td> <a href='#'>X</a></td>`;
    tbody[0].append(tr);
}


// Book.prototype.remove = function (){
//     console.log(tbody);
// }

// Manipulating the DOM
addBtn.addEventListener('click',(e)=>{
    e.preventDefault();
    title = inputs[0].value;
    author = inputs[1].value;
    isbn = inputs[2].value;
    
    var book = new Book(title,author,isbn);

    book.add();
    remove();
    initInputs( );
 
})

document.addEventListener('click',function(e){
    if (e.target.textContent === 'X'){
        remove();
    }
})


// Functions ---------
function remove (){
    const len = a.length; 
    for(let i = 0 ; i < a.length ; i++){
        a[i].addEventListener('click',function(event){
            const node = event.target.parentElement.parentElement;
            node.remove();
        })
    }
}
    
function initInputs(){
    inputs[0].value = '';
    inputs[1].value = '';
    inputs[2].value = '';
}






