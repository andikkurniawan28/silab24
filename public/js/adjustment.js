function processTonnase(){
    let tonnase = [];
    let tonnase_persen_tebu = [];
    tonnase = getTonnaseValue();
    tonnase_persen_tebu = getTonnasePercentTebuValue(tonnase);
    setTonnaseToView(tonnase);
    setTonnasePercentTebuToView(tonnase_persen_tebu);
    processTonNiraMentah();
}

function getTonnaseAmpas(tonnase){
    return Number(tonnase['tebu'] + tonnase['imbibisi'] - tonnase['nira_mentah']).toFixed(2);
}

function getTonnaseValue(){
    let tonnase = [];
    tonnase['tebu'] = Number(document.getElementById("tonnase['tebu']").innerHTML);
    tonnase['imbibisi'] = Number(document.getElementById("tonnase['imbibisi']").value);
    tonnase['nira_mentah'] = Number(document.getElementById("tonnase['nira_mentah']").value);
    tonnase['ampas'] = getTonnaseAmpas(tonnase);
    return tonnase;
}

function getTonnasePercentTebuValue(tonnase){
    let tonnase_persen_tebu = [];
    tonnase_persen_tebu['imbibisi'] = (tonnase['imbibisi'] / tonnase['tebu'] * 100).toFixed(2);
    tonnase_persen_tebu['nira_mentah'] = (tonnase['nira_mentah'] / tonnase['tebu'] * 100).toFixed(2);
    tonnase_persen_tebu['ampas'] = (tonnase['ampas'] / tonnase['tebu'] * 100).toFixed(2);
    return tonnase_persen_tebu;
}

function processNpp(){
    let analysis = [];
    analysis = getAnalysisValueNpp();
    setNppValueToView(analysis);
}

function generateHk(brix, pol){
    return Number((pol / brix) * 100).toFixed(2);
}

function getAnalysisValueNpp(){
    let analysis = [];
    analysis['brix_npp'] = Number(document.getElementById("analysis['brix_npp']").value);
    analysis['pol_npp'] = Number(document.getElementById("analysis['pol_npp']").value);
    analysis['hk_npp'] = generateHk(analysis['brix_npp'], analysis['pol_npp']);
    return analysis;
}

function processNiraMentah(){
    let analysis = [];
    analysis = getAnalysisValueNiraMentah();
    setNiraMentahValueToView(analysis);
    processTonNiraMentah();
}

function getAnalysisValueNiraMentah(){
    let analysis = [];
    analysis['brix_nira_mentah'] = Number(document.getElementById("analysis['brix_nira_mentah']").value);
    analysis['pol_nira_mentah'] = Number(document.getElementById("analysis['pol_nira_mentah']").value);
    analysis['hk_nira_mentah'] = generateHk(analysis['brix_nira_mentah'], analysis['pol_nira_mentah']);
    return analysis;
}

function setTonnaseToView(tonnase){
    document.getElementById("tonnase['imbibisi']").value = tonnase['imbibisi'];
    document.getElementById("tonnase['nira_mentah']").value = tonnase['nira_mentah'];
    document.getElementById("tonnase['ampas']").innerHTML = tonnase['ampas'];
}

function setTonnasePercentTebuToView(tonnase_persen_tebu){
    document.getElementById("tonnase_persen_tebu['imbibisi']").innerHTML = tonnase_persen_tebu['imbibisi'];
    document.getElementById("tonnase_persen_tebu['nira_mentah']").innerHTML = tonnase_persen_tebu['nira_mentah'];
    document.getElementById("tonnase_persen_tebu['ampas']").innerHTML = tonnase_persen_tebu['ampas'];
}

function setNppValueToView(analysis){
    document.getElementById("analysis['brix_npp']").value = analysis['brix_npp'];
    document.getElementById("analysis['pol_npp']").value = analysis['pol_npp'];
    document.getElementById("analysis['hk_npp']").innerHTML = analysis['hk_npp'];
}

function setNiraMentahValueToView(analysis){
    document.getElementById("analysis['brix_nira_mentah']").value = analysis['brix_nira_mentah'];
    document.getElementById("analysis['pol_nira_mentah']").value = analysis['pol_nira_mentah'];
    document.getElementById("analysis['hk_nira_mentah']").innerHTML = analysis['hk_nira_mentah'];
}

function processTonNiraMentah(){
    let analysis = [];
    let tonnase = [];
    analysis = getAnalysisValueNiraMentah();
    tonnase = getTonnaseValue();
    ton_pol = setTonMaterial(analysis['pol_nira_mentah'], tonnase['nira_mentah']);
    ton_brix = setTonMaterial(analysis['brix_nira_mentah'], tonnase['nira_mentah']);
    setTonNiraMentahValueToView(ton_pol, ton_brix);
}

function setTonMaterial(analysis, tonnase){
    return Number(analysis * tonnase/ 100).toFixed(2);
}

function setTonNiraMentahValueToView(ton_pol, ton_brix){
    document.getElementById("ton_pol['nira_mentah']").innerHTML = ton_pol;
    document.getElementById("ton_brix['nira_mentah']").innerHTML = ton_brix;
}
