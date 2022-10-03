# Study Portal Policies

All policies are mainly implemented in the corresponding controller where the authorisation for that action is determined before the action has taken place.

References to the controllers and the controller endpoints can be found within the main route (web.php) file assuming that you know the web endpoint for that action but this is easy enough to find out with the convenient naming of the endpoints.

In some cases, the policies may be implemented inside the views themselves. This would primarily be done if a button is required to be hidden if a user does not have that permission to do the action.

Adding the policies to the controllers where most of the content is changed and takes effect in the database is a lot more efficient than doing it anywhere else.