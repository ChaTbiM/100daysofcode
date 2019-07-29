
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

function createElf(name,weapon){
    return {
        name,
        weapon,
        attack(){
            return ("attack with ") + weapon;
        }
    }
}

const Orwell = createElf("Orwell","bow");
const Sally = createElf("Sally","Bazuka");

console.log(Orwell);
console.log(Sally);