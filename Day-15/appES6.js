// BOOk constructor
// Es6
class Book{
    constructor(title,author,isbn){
        this.title = title; 
        this.author = author;
        this.isbn = isbn;
    }
}



// UI Constructor 
// ES6 
class UI{

    addBookToList(book){
        const list = document.getElementById('book-list');

    const tr = document.createElement('tr');
    tr.innerHTML = ` <td>${book.title}</td>
    <td>${book.author}</td>
    <td>${book.isbn}</td>
    <td><a href="#" class='delete'>X</a></td> `;
    
    list.append(tr);

    this.saveToLocal();
    }

    showAlert(message,className){
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


    deleteBook(target){
        if(target.className = 'delete'){
            target.parentElement.parentElement.remove();
          
        }

        this.removeFromLocal(target.parentElement.previousElementSibling.textContent)
        // console.log(target.parentElement.previousElementSibling.textContent)
    }

    clearFields(){
        document.getElementById('title').value = '';
        document.getElementById('author').value = '';
        document.getElementById('isbn').value = '';
    }

    // Local Storage
    initFromLocal(){
        // get saved books from local storage if exist !
        if(!(localStorage.length === 0)){
            // there is books in local storage update the UI
            const data = JSON.parse(localStorage.getItem('booksList'));
           
            data.forEach(element => {
                this.addBookToList(element);
            });

        }

    }


    saveToLocal(){
        const list = document.getElementById('book-list');
        const data = [];
        for(let i = 0 ; i < list.children.length; i++){
            const item = {};

            item.title = list.children[i].children[0].textContent;
            item.author = list.children[i].children[1].textContent;
            item.isbn = list.children[i].children[2].textContent;

            data.push(item);
        }
        
        localStorage.setItem('booksList', JSON.stringify(data));
        
    }


    removeFromLocal(isbnTarget){
        const data = JSON.parse(localStorage.getItem('booksList'));
       
        data.forEach((element , index)=>{
            if(element.isbn === isbnTarget){
                data.splice(index,1);
            }
        })
        
        this.saveToLocal(data);

    }


}

 let timeOutId = 0; 






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

document.addEventListener('DOMContentLoaded', function(e){

    const ui = new UI();

    ui.initFromLocal();

    e.preventDefault();
})