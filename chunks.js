const Members = require("members.json");
const TripleM = require("triple-m/lib/transpiler");

module.exports = function() {
    TripleM.MMM.CreateMacro("ICON", (args) => {
        return {output: `<link rel="icon" type="image/x-icon" href="${args[1]}" />`}
    })

    TripleM.MMM.CreateMacro("PAGE", (args) => {
        return {
            output: `<div><a href="${args[2]}"><i class="bi-${args[1].toLowerCase()}"></i></a></div>`
        };
    });

    TripleM.MMM.CreateMacro("MEMBER", (args) => {
        return {
            output: `<div class="member-card">
                <div class="member-photo" style="background-image: url('img/theteam/${args[1]}.png');"></div>
                <div class="h1 glow gradient">$>${Members[args[1]].name}</div>
            </div>`
        }
    });
};