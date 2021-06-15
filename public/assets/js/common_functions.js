/**
 * 공통 기능 함수 정의 ver1.0
 * 작성자 : InnoKim(김정환)
 * 최초 작성일 : 2021-04-15
 * 최종 수정일 : 2021-06-03
 *
 * ### DESCRIPTION ###
 * - Modify History
 *      - 2020-06-03 : 개발 중인 기능일 경우 알림창 띄우는 함수 추가
 */

/**
 * 문자열이 빈 문자열인지 체크하여 결과값을 리턴
 * @param str       : 체크할 문자열
 */
function isEmpty(str){
    if(typeof str == "undefined" || str == null || str == "")
        return true;
    else
        return false ;
}

/**
 * 문자열이 빈 문자열인지 체크하여 기본 문자열로 리턴
 * @param str           : 체크할 문자열
 * @param defaultStr    : 문자열이 비어있을경우 리턴할 기본 문자열
 */
function nvl(str, defaultStr){
    if(typeof str == "undefined" || str == null || str == "")
        str = defaultStr ;

    return str ;
}

// 개발 중인 기능일 경우 알림창 띄움
function alertDeveloping() {
    alert('현재 개발 중입니다.');
    return false;
}
