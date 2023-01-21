*** Settings ***
Documentation    To Validate errors when the database is not working
Library        SeleniumLibrary    
Test Teardown    Close Browser
Resource      variables.robot

*** Test Cases ***
Validate Metrics
    Open Browser to Metrics Page
    Checks for Metrics error
    Verify Metrics error message

Validate Login
    Open Browser To Login Page
    Fill the login form
    Checks for Login error
    Verify Login error message

*** Keywords ***
Open Browser to Metrics Page
    Create Webdriver    Chrome    executable_path=/usr/local/bin/chromedriver
    Go To    ${URL}${METRICS_PATH}

Checks for Metrics error
    Wait Until Element Is Visible    ${METRICS_ERROR_ID}

Verify Metrics error message
    ${result}=    Get Text    ${METRICS_ERROR_ID}
    Should Be Equal As Strings    ${result}    ${METRICS_ERROR_MESSAGE}
    Element Text Should Be    ${METRICS_ERROR_ID}    ${METRICS_ERROR_MESSAGE}

Open Browser To Login Page
    Create Webdriver    Chrome    executable_path=/usr/local/bin/chromedriver
    Go To    ${URL}${LOGIN_PATH}

Fill the login Form
    Input Text    id:email    ${LOGIN_ADMIN_EMAIL}
    Input Password    id:password    admin
    Click Button    loginButton

Checks for Login error
    Wait Until Element Is Visible    ${ERROR_PAGE_ID}

Verify Login error message
    ${result}=    Get Text    ${ERROR_PAGE_ID}
    Should Be Equal As Strings    ${result}    ${ERROR_PAGE_MESSAGE}
    Element Text Should Be    ${ERROR_PAGE_ID}    ${ERROR_PAGE_MESSAGE}