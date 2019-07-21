// BOOk constructor
function Book(title,author,isbn){
    this.title = title;
    this.author = author;
    this.isbn = isbn; 

};


// UI Constructor 

function UI(){};

UI.prototype.addBookToList = function(book){
    const list = document.getElementById('book-list');

    const tr = document.createElement('tr');
    tr.innerHTML = ` <td>${book.title}</td>
    <td>${book.author}</td>
    <td>${book.isbn}</td>
    <td><a href="#" class='delete'>X</a></td> `;
    
    list.append(tr);
}

 let timeOutId = 0; 

UI.prototype.showAlert = function( message , className ){
     let exist = document.querySelector('.error');

     if(exist && timeOutId ){
         exist.remove();
         clearTimeout(timeOutId);
     }

       
       // Create div
       const div = document.createElement('div');
       // Add Classes
       div.className = `alert ${className}`;
       // Add Message
       div.appendChild(document.createTextNode(message));
       
       // insert div
       const form = document.querySelector('#form');
       
       form.prepend(div);
       
       // Delete Alter After 3 seconds     

        timeOutId = setTimeout(() => {
               document.querySelector(`.${className}`).remove();
            }, 3000);
}

UI.prototype.deleteBook = function(target){
    if(target.className = 'delete'){
        target.parentElement.parentElement.remove();
    }
}

UI.prototype.clearFields = function(){
    document.getElementById('title').value = '';
    document.getElementById('author').value = '';
    document.getElementById('isbn').value = '';
}


//  Event Listeners 
document.getElementById('form').addEventListener('submit', function(e){
    e.preventDefault();

    // Get form values
    const title = document.getElementById('title').value,
            author = document.getElementById('author').value,
            isbn = document.getElementById('isbn').value;

    // instantiate a book 
    const book = new Book(title,author,isbn);

    // Instantiate a UI
    const ui = new UI();

    // validate form inputs 
    if(title === '' || author === '' || isbn === ''){
        ui.showAlert("Please Fill in all fields" , "error"); 
    }else {
         // add book to a list
        ui.addBookToList(book);

        // show success Alert
        ui.showAlert('Book added!', 'success');
        // clear fields
        ui.clearFields();
    }   

})


//  Event Listener for Delete

document.getElementById('book-list').addEventListener('click',function(e){
    
    // instantiate UI
   const ui = new UI();

    // Delete BOok
   ui.deleteBook(e.target);  

    // Show Alert
    ui.showAlert('Book Removed !', 'success');

    e.preventDefault();
})