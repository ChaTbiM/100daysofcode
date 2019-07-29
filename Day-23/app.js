
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

const elfFunctions = {
    attack(){
        return ("attack with " + this.weapon);
    }
};

function createElf(name,weapon){
    let newElf = Object.create(elfFunctions);
    newElf.name = name;
    newElf.weapon = weapon;

    return newElf;
}

const Orwell = createElf("Orwell","Arrows");
const Peter = createElf("Peter", "Stones");

