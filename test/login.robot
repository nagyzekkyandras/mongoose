*** Settings ***
Documentation    To Validate the Login
Library        SeleniumLibrary    
Test Teardown    Close Browser
Resource      variables.robot

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
    Wait Until Element Is Visible    ${LOGIN_ERROR_ID}

Verify error message
    ${result}=    Get Text    ${LOGIN_ERROR_ID}
    Should Be Equal As Strings    ${result}    ${LOGIN_ERROR_MESSAGE}
    Element Text Should Be    ${LOGIN_ERROR_ID}    ${LOGIN_ERROR_MESSAGE}

Open Profile page and check email
    Go To    ${URL}${PROFILE_PATH}
    ${result}=    Get Text    ${PROFILE_EMAIL_ID}
    Should Be Equal As Strings    ${result}    ${PROFILE_EMAIL_MESSAGE} 
    Element Text Should Be    ${PROFILE_EMAIL_ID}    ${PROFILE_EMAIL_MESSAGE} 