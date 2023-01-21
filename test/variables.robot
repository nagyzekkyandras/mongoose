*** Variables ***
# base variables
${PROTOCOL}    http
${HOST}    127.0.0.1
${URL}    ${PROTOCOL}://${HOST}/

# login variables
${LOGIN_PATH}    login.php
${LOGIN_ERROR_ID}    css:.alert-danger
${LOGIN_ERROR_MESSAGE}    Wrong credentials!
${LOGIN_ADMIN_EMAIL}    admin@admin.hu

# profile variables
${PROFILE_PATH}    profile.php
${PROFILE_EMAIL_ID}    id:email
${PROFILE_EMAIL_MESSAGE}    Email: ${LOGIN_ADMIN_EMAIL}

# metric variables
${METRICS_PATH}    metrics.php
${METRICS_ERROR_ID}    id:error
${METRICS_ERROR_MESSAGE}    Caught exception: An exception occurred in the driver: SQLSTATE[HY000] [2002] Connection refused

# error page variables
${ERROR_PAGE_ID}    id:error
${ERROR_PAGE_MESSAGE}    Something went wrong!