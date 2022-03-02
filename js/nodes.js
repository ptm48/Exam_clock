var Nodes = function() {
    function getExams() {
        let hallExams = document.getElementsByClassName('exam-hall');
        let entExams = document.getElementsByClassName('exam-ent');

        return {
            hallExams : hallExams,
            entExams : entExams
        }
    }

    function getMainPageNodes() {
        let mainPageNodes = {
            threeDots: document.getElementsByClassName('main-page__three-dots')[0],
            centreNum: document.getElementsByClassName('main-page__centre-num')[0]
        }
        return mainPageNodes;
    }

    var nodes = {
        mainPage : getMainPageNodes(),
    }

    function getNodes() {
        return nodes;
    }

    return {
        getNodes: getNodes,
        getExams : getExams
    }
}()