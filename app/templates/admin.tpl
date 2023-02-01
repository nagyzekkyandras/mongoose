{* Smarty *}
<div class="container mt-3">
<h2>Users</h2>
    <a href="#users" class="btn btn-primary" data-bs-toggle="collapse">Show users</a>
    <div id="users" class="collapse">
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
</div>

<div class="container mt-3">
  <h2>Nexus</h2>
  <a href="#nexus" class="btn btn-primary" data-bs-toggle="collapse">Show repositories</a>
  <div id="nexus" class="collapse">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">USERNAME</th>
                <th scope="col">URL</th>
                <th scope="col">CREATE DATE</th>
            </tr>
        </thead>
        <tbody>
        {foreach item='repo' from=$nexus}
        <tr>
            <td>{$repo.id}</td>
            <td>{$repo.name}</td>
            <td>{$repo.username}</td>
            <td>{$repo.url}</td>
            <td>{$repo.create_date}</td>
        </tr>
        {/foreach}
        </tbody>
    </table>
  </div>
</div>

<div class="container mt-3">
  <h2>Gitlab</h2>
  <a href="#gitlab" class="btn btn-primary" data-bs-toggle="collapse">Show Gitlabs</a>
  <div id="gitlab" class="collapse">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">URL</th>
            </tr>
        </thead>
        <tbody>
        {foreach item='gitlab' from=$gitlabs}
        <tr>
            <td>{$gitlab.id}</td>
            <td>{$gitlab.name}</td>
            <td>{$gitlab.url}</td>
        </tr>
        {/foreach}
        </tbody>
    </table>
  </div>
</div>

<div class="container mt-3">
  <h2>Pipelines</h2>
  <a href="#pipelines" class="btn btn-primary" data-bs-toggle="collapse">Show Pipelines</a>
  <div id="pipelines" class="collapse">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </div>
</div>