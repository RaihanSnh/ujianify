const AntiCheatData = {
    intervalCheck: 250,
    lastCheck: null,
    warning: 0,
    maxWarn: 2,
    compensation: 500,
};


function LoadAntiCheat() {
    setTimeout(function () {
        _LoadAntiCheat();
    }, 5000);
}

function _LoadAntiCheat() {
    AntiCheatData.lastCheck = Date.now();
    setInterval(function () {
        console.log(AntiCheatData);
        if(Date.now() - AntiCheatData.lastCheck >= AntiCheatData.intervalCheck + AntiCheatData.compensation) {
            AntiCheatData.warning++;
            if(AntiCheatData.warning >= AntiCheatData.maxWarn) {
                alert("Cheating detected!\nKeep fair bro");
                AntiCheatData.warning = 0;
            }
        }
        AntiCheatData.lastCheck = Date.now();
    }, AntiCheatData.intervalCheck);
}
