*** Settings ***
Documentation    To Validate the Login form
Library        SeleniumLibrary    
Test Teardown    Close Browser

*** Variables ***
# base variables
${PROTOCOL}    http
${HOST}    127.0.0.1
${LOGIN_PATH}    login.php

# login variables
${LOGIN_ERROR_MESSAGE}    css:.alert-danger

*** Test Cases ***
Validate Login
    Open Browser To Login Page
    Fill the login form

Validate Login error
    Open Browser To Login Page
    Fill the login Form with bad credentials
    Checks for error
    Verify error message

*** Keywords ***
Open Browser To Login Page
    Create Webdriver    Chrome    executable_path=/usr/local/bin/chromedriver
    Go To    ${PROTOCOL}://${HOST}/${LOGIN_PATH}

Fill the login Form
    Input Text    id:email    admin@admin.hu
    Input Password    id:password    admin
    Click Button    loginButton

Fill the login Form with bad credentials
    Input Text    id:email    asd@asd.hu
    Input Password    id:password    asd
    Click Button    loginButton

Checks for error
    Wait Until Element Is Visible    ${LOGIN_ERROR_MESSAGE}

Verify error message
    ${result}=    Get Text    ${LOGIN_ERROR_MESSAGE}
    Should Be Equal As Strings    ${result}    Wrong credentials!
    Element Text Should Be    ${LOGIN_ERROR_MESSAGE}    Wrong credentials!