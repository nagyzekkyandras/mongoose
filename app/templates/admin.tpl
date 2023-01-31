{* Smarty *}
<div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">EMAIL</th>
            <th scope="col">AUTH TYPE</th>
            <th scope="col">PERMISSION</th>
            <th scope="col">CREATE DATE</th>
            <th scope="col">LAST LOGIN</th>
        </tr>
    </thead>
    <tbody>
{foreach item='user' from=$users}
    <tr>
        <td>{$user.id}</td>
        <td>{$user.name}</td>
        <td>{$user.email}</td>
        <td>{$user.auth_type}</td>
        <td>{$user.permission}</td>
        <td>{$user.create_date}</td>
        <td>{$user.last_login}</td>
    </tr>
{/foreach}
    </tbody>
</table>
</div>