const TripleM = require("triple-m");
const fs = require("fs");

const Members = JSON.parse(fs.readFileSync('./members.json', { encoding: "utf-8" }));

module.exports = function() {
    TripleM.MMM.CreateMacro("ICON", (args) => {
        return {output: `<link rel="icon" type="image/x-icon" href="${args[1]}" />`}
    })

    TripleM.MMM.CreateMacro("PAGE", (args) => {
        return {
            output: `<div class="glow"><a href="${args[2]}">
            <i class="bi-${args[1].toLowerCase()}"></i>
            <span>${args[1]}</span>
            </a></div>`
        };
    });

    TripleM.MMM.CreateMacro("MEMBER", (args) => {
        let JobDescString = "";
        if (Members[args[1]].JobDescription != null) {
            for (let i = 0; i < Members[args[1]].JobDescription.length; i++) {
                JobDescString += `<li>${Members[args[1]].JobDescription[i]}</li>`;
            }
        }
        return {
            output: `<div class="member-card">
                <div>
                    <div onclick="document.getElementById('${args[1]}').showModal();" class="member-photo" style="background-image: url('img/theteam/${args[1]}.jpg');"></div>
                    <div class="h2 glow">${Members[args[1]].Name}</div>
                    <div class="glow gradient">${Members[args[1]].Role}</div>
                </div>
                ${Members[args[1]].JobDescription != null ? `<div>
                    <ul>
                        ${JobDescString}
                    </ul>
                </div>` : ""}
            </div>
            <dialog id="${args[1]}">
                <a onclick="document.getElementById('${args[1]}').close()" class="close-button"><i class="bi-x-circle-fill"></i></a>
                <div class="container grid-2">
                    <img src="img/theteam/${args[1]}2.jpg" width="100%" />
                    <div class="container">
                        <div class="h1 glow">${Members[args[1]].Name}</div>
                        <div class="h2 glow gradient">${Members[args[1]].Role}</div>
                        <p>${Members[args[1]].MemberDescription}</p>
                        <ul>
                            ${Members[args[1]].LinkedIn != null ? `<li><i class="bi-linkedin"></i> <a target="_blank" href="https://www.linkedin.com/in/${Members[args[1]].LinkedIn}">LinkedIn</a></li>` : ""}
                            ${Members[args[1]].Instagram != null ? `<li><i class="bi-instagram"></i> <a target="_blank" href="https://instagram.com/${Members[args[1]].Instagram}">Instagram</a></li>` : ""}
                        </ul>
                    </div>
                </div>
            </dialog>`
        }
    });
};