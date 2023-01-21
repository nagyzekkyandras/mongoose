*** Settings ***
Documentation    To Validate the Login form
Library        SeleniumLibrary    
Test Teardown    Close Browser

*** Variables ***
# base variables
${PROTOCOL}    http
${HOST}    127.0.0.1
${URL}    ${PROTOCOL}://${HOST}/

# login variables
${LOGIN_PATH}    login.php
${LOGIN_ERROR_MESSAGE}    css:.alert-danger
${LOGIN_ADMIN_EMAIL}    admin@admin.hu

# profile variables
${PROFILE_PATH}    profile.php
${PROFILE_CHECK}    "Email: ${LOGIN_ADMIN_EMAIL}"
${PROFILE_ERROR_MESSAGE}    id:email

*** Test Cases ***
Validate Login
    Open Browser To Login Page
    Fill the login form
    Open Profile page and check email

Validate Login error
    Open Browser To Login Page
    Fill the login Form with bad credentials
    Checks for error
    Verify error message

*** Keywords ***
Open Browser To Login Page
    Create Webdriver    Chrome    executable_path=/usr/local/bin/chromedriver
    Go To    ${URL}${LOGIN_PATH}

Fill the login Form
    Input Text    id:email    ${LOGIN_ADMIN_EMAIL}
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

Open Profile page and check email
    Go To    ${URL}${PROFILE_PATH}
    ${result}=    Get Text    ${PROFILE_ERROR_MESSAGE}
    Should Be Equal As Strings    ${result}    Email: ${LOGIN_ADMIN_EMAIL}
    Element Text Should Be    ${PROFILE_ERROR_MESSAGE}    Email: ${LOGIN_ADMIN_EMAIL}