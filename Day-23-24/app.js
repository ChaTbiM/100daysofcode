
// const elf = {
//     name:"Orwell",
//     weapon: "bow",
//     attack(){
//         console.log("attack with a bow")
//     }
// }

// const elf2 = {
//     name:"Sally",
//     weapon:"bow",
//     attack(){
//         console.log("attack with a bow!");
//     }
// }

// console.log(elf);
// console.log(elf2);

// Dont Repeat Yourself ! 

// function createElf(name,weapon){
//     return {
//         name,
//         weapon,
//         attack(){
//             return ("attack with ") + weapon;
//         }
//     }
// }

// const Orwell = createElf("Orwell","bow");
// const Sally = createElf("Sally","Bazuka");

// console.log(Orwell);
// console.log(Sally);

// Because of the attack method is repeated it takes alot of memory 

// Another solution with prototypal inheritance
// Object.create()

// const elfFunctions = {
//     attack(){
//         return ("attack with " + this.weapon);
//     }
// };

// function createElf(name,weapon){
//     let newElf = Object.create(elfFunctions);
//     newElf.name = name;
//     newElf.weapon = weapon;

//     return newElf;
// }

// const Orwell = createElf("Orwell","Arrows");
// const Peter = createElf("Peter", "Stones");



// Prototypal inheritance with __proto__
// let dragon = {
//     name:"Tanya",
//     fire:true,
//     fight(){
//         return 5
//     },
//     sing(){
//         if(this.fire){

//             return `I am ${this.name}, the breather of fire`
//         }
//     }
// } 

// let lizard = {
//     name:"Kiki",
//     fight(){
//         return 1
//     }
// }

// // const signLizard = dragon.sing.bind(lizard);
// lizard.__proto__ = dragon;

// dragon.__proto__.dance = function(){
//     return "justa Dance !";
// }


// Constructor function 
// function Elf(name,weapon){
//     this.name = name;
//     this.weapon = weapon;

//     let a = 1997; // this variable is not created in the instantiated objects
// }

// Elf.prototype.attack = function(){
//     return "attack with " + this.weapon;
// }

// const peter = new Elf("Peter","Stones");
// const sam = new Elf("Sam","Bow");

// // other naive way to do constructor functions
// const Elf1 = new Function("name","weapon",`
// this.name = name;
// this.weapon = weapon`);

// const sara = new Elf1("sara","arrows");


// Es6 classes 

// class Elf {
//     constructor(name,weapon){
//         this.name = name;
//         this.weapon = weapon;
//     }

//     attack(){
//         return "attack with " +this.weapon;
//     }
// }

// const peter = new Elf("peter" ,"Bow");

// This context 

// implicit binding
const person1 = {
    name:"Mustapha",
    sayHi(){
        console.log("Hi my Name is " + this.name);
    }
}
// new binding this

// function Person (name){
//     this.name = name;

// }

// Person.prototype.sayHi = function (){
//     return "Hi My Name is " + this.name;
// }

class Person{
    constructor(name){
        this.name = name;
    }

    sayHi(){
        return "My name is " + this.name;
    }
}

const person2 = new Person("Mus dev");


// explicit binding
const p3 = new Person("Jack");
const p4 = new Person("Sam");

p3.alert = function(){
    return "I am " + this.name + " , Hands up";
}

p4.alert = p3.alert.bind(p4);
// console.log(p4.alert())


// arrow functions (lexical scoping) < whenever we write arrow function will be the context

const p5 = {
    name:"Mus Dev V2.0",
    sayWhat(){
        return (()=>{
            console.log(this.name)
        })()
    }
}

// Inheritance with Es6

class Character {
    constructor(name,weapon){
        this.name = name;
        this.weapon = weapon;
    }

    attack(){
        return "attack with " + this.weapon;
    }
}

const normal = new Character('normal','nothing')

class Elf extends Character{
   
    constructor(name,weapon,type){
       
        super(name,weapon);
        this.type = type;
        
    }
    sayHi(){
        return " Hi I am " + this.type;
    }
}

const fasco = new Elf("fasco","spoon","pet Elf");

class ElfMutated extends Elf {
    constructor(name,weapon,type,color){
        super(name,weapon,type);
        this.color = color;
    }

    kill(){
        return "I want to kill every Elf";
    }
}

const fisco = new ElfMutated('fisco','bair hands','dagnerous','pink');