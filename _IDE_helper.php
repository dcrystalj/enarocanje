<?php
namespace {
	die('Only to be used as an helper for your IDE');
}

namespace  {
 class Auth extends Illuminate\Auth\Guard{
	/**
	 * Create a new authentication guard.
	 *
	 * @static
	 * @param	Illuminate\Auth\UserProviderInterface	$provider
	 * @param	Illuminate\Session\Store	$session
	 */
	 public static function __construct($provider, $session){
		parent::__construct($provider, $session);
	 }

	/**
	 * Determine if the current user is authenticated.
	 *
	 * @static
	 * @return bool
	 */
	 public static function check(){
		return parent::check();
	 }

	/**
	 * Determine if the current user is a guest.
	 *
	 * @static
	 * @return bool
	 */
	 public static function guest(){
		return parent::guest();
	 }

	/**
	 * Get the currently authenticated user.
	 *
	 * @static
	 * @return Illuminate\Auth\UserInterface|null
	 */
	 public static function user(){
		return parent::user();
	 }

	/**
	 * Log a user into the application without sessions or cookies.
	 *
	 * @static
	 * @param	array	$credentials
	 * @return bool
	 */
	 public static function stateless($credentials = array()){
		return parent::stateless($credentials);
	 }

	/**
	 * Validate a user's credentials.
	 *
	 * @static
	 * @param	array	$credentials
	 * @return bool
	 */
	 public static function validate($credentials = array()){
		return parent::validate($credentials);
	 }

	/**
	 * Attempt to authenticate a user using the given credentials.
	 *
	 * @static
	 * @param	array	$credentials
	 * @param	bool	$remember
	 * @param	bool	$login
	 * @return bool
	 */
	 public static function attempt($credentials = array(), $remember = false, $login = true){
		return parent::attempt($credentials, $remember, $login);
	 }

	/**
	 * Log a user into the application.
	 *
	 * @static
	 * @param	Illuminate\Auth\UserInterface	$user
	 * @param	bool	$remember
	 */
	 public static function login($user, $remember = false){
		parent::login($user, $remember);
	 }

	/**
	 * Log the given user ID into the application.
	 *
	 * @static
	 * @param	mixed	$id
	 * @param	bool	$remember
	 * @return Illuminate\Auth\UserInterface
	 */
	 public static function loginUsingId($id, $remember = false){
		return parent::loginUsingId($id, $remember);
	 }

	/**
	 * Log the user out of the application.
	 *
	 * @static
	 */
	 public static function logout(){
		parent::logout();
	 }

	/**
	 * Get the cookie creator instance used by the guard.
	 *
	 * @static
	 * @return Illuminate\Cookie\CookieJar
	 */
	 public static function getCookieJar(){
		return parent::getCookieJar();
	 }

	/**
	 * Set the cookie creator instance used by the guard.
	 *
	 * @static
	 * @param	Illuminate\Cookie\CookieJar	$cookie
	 */
	 public static function setCookieJar($cookie){
		parent::setCookieJar($cookie);
	 }

	/**
	 * Get the event dispatcher instance.
	 *
	 * @static
	 * @return Illuminate\Events\Dispatcher
	 */
	 public static function getDispatcher(){
		return parent::getDispatcher();
	 }

	/**
	 * Set the event dispatcher instance.
	 *
	 * @static
	 * @param	Illuminate\Events\Dispatcher
	 */
	 public static function setDispatcher($events){
		parent::setDispatcher($events);
	 }

	/**
	 * Get the session store used by the guard.
	 *
	 * @static
	 * @return Illuminate\Session\Store
	 */
	 public static function getSession(){
		return parent::getSession();
	 }

	/**
	 * Get the cookies queued by the guard.
	 *
	 * @static
	 * @return array
	 */
	 public static function getQueuedCookies(){
		return parent::getQueuedCookies();
	 }

	/**
	 * Get the user provider used by the guard.
	 *
	 * @static
	 * @return Illuminate\Auth\UserProviderInterface
	 */
	 public static function getProvider(){
		return parent::getProvider();
	 }

	/**
	 * Return the currently cached user of the application.
	 *
	 * @static
	 * @return Illuminate\Auth\UserInterface|null
	 */
	 public static function getUser(){
		return parent::getUser();
	 }

	/**
	 * Set the current user of the application.
	 *
	 * @static
	 * @param	Illuminate\Auth\UserInterface	$user
	 */
	 public static function setUser($user){
		parent::setUser($user);
	 }

	/**
	 * Get a unique identifier for the auth session value.
	 *
	 * @static
	 * @return string
	 */
	 public static function getName(){
		return parent::getName();
	 }

	/**
	 * Get the name of the cookie used to store the "recaller".
	 *
	 * @static
	 * @return string
	 */
	 public static function getRecallerName(){
		return parent::getRecallerName();
	 }

 }
}

namespace  {
 class DB extends Illuminate\Database\Connection{
	/**
	 * Create a new database connection instance.
	 *
	 * @static
	 * @param	PDO	$pdo
	 * @param	string	$database
	 * @param	string	$tablePrefix
	 * @param	array	$config
	 */
	 public static function __construct($pdo, $database = '', $tablePrefix = '', $config = array()){
		parent::__construct($pdo, $database, $tablePrefix, $config);
	 }

	/**
	 * Set the query grammar to the default implementation.
	 *
	 * @static
	 */
	 public static function useDefaultQueryGrammar(){
		parent::useDefaultQueryGrammar();
	 }

	/**
	 * Set the schema grammar to the default implementation.
	 *
	 * @static
	 */
	 public static function useDefaultSchemaGrammar(){
		parent::useDefaultSchemaGrammar();
	 }

	/**
	 * Set the query post processor to the default implementation.
	 *
	 * @static
	 */
	 public static function useDefaultPostProcessor(){
		parent::useDefaultPostProcessor();
	 }

	/**
	 * Get a schema builder instance for the connection.
	 *
	 * @static
	 * @return Illuminate\Database\Schema\Builder
	 */
	 public static function getSchemaBuilder(){
		return parent::getSchemaBuilder();
	 }

	/**
	 * Begin a fluent query against a database table.
	 *
	 * @static
	 * @param	string	$table
	 * @return Illuminate\Database\Query\Builder
	 */
	 public static function table($table){
		return parent::table($table);
	 }

	/**
	 * Get a new raw query expression.
	 *
	 * @static
	 * @param	mixed	$value
	 * @return Illuminate\Database\Query\Expression
	 */
	 public static function raw($value){
		return parent::raw($value);
	 }

	/**
	 * Run a select statement and return a single result.
	 *
	 * @static
	 * @param	string	$query
	 * @param	array	$bindings
	 * @return mixed
	 */
	 public static function selectOne($query, $bindings = array()){
		return parent::selectOne($query, $bindings);
	 }

	/**
	 * Run a select statement against the database.
	 *
	 * @static
	 * @param	string	$query
	 * @param	array	$bindings
	 * @return array
	 */
	 public static function select($query, $bindings = array()){
		return parent::select($query, $bindings);
	 }

	/**
	 * Run an insert statement against the database.
	 *
	 * @static
	 * @param	string	$query
	 * @param	array	$bindings
	 * @return bool
	 */
	 public static function insert($query, $bindings = array()){
		return parent::insert($query, $bindings);
	 }

	/**
	 * Run an update statement against the database.
	 *
	 * @static
	 * @param	string	$query
	 * @param	array	$bindings
	 * @return int
	 */
	 public static function update($query, $bindings = array()){
		return parent::update($query, $bindings);
	 }

	/**
	 * Run a delete statement against the database.
	 *
	 * @static
	 * @param	string	$query
	 * @param	array	$bindings
	 * @return int
	 */
	 public static function delete($query, $bindings = array()){
		return parent::delete($query, $bindings);
	 }

	/**
	 * Execute an SQL statement and return the boolean result.
	 *
	 * @static
	 * @param	string	$query
	 * @param	array	$bindings
	 * @return bool
	 */
	 public static function statement($query, $bindings = array()){
		return parent::statement($query, $bindings);
	 }

	/**
	 * Run an SQL statement and get the number of rows affected.
	 *
	 * @static
	 * @param	string	$query
	 * @param	array	$bindings
	 * @return int
	 */
	 public static function affectingStatement($query, $bindings = array()){
		return parent::affectingStatement($query, $bindings);
	 }

	/**
	 * Run a raw, unprepared query against the PDO connection.
	 *
	 * @static
	 * @param	string	$query
	 * @return bool
	 */
	 public static function unprepared($query){
		return parent::unprepared($query);
	 }

	/**
	 * Prepare the query bindings for execution.
	 *
	 * @static
	 * @param	array	$bindings
	 * @return array
	 */
	 public static function prepareBindings($bindings){
		return parent::prepareBindings($bindings);
	 }

	/**
	 * Execute a Closure within a transaction.
	 *
	 * @static
	 * @param	Closure	$callback
	 * @return mixed
	 */
	 public static function transaction($callback){
		return parent::transaction($callback);
	 }

	/**
	 * Execute the given callback in "dry run" mode.
	 *
	 * @static
	 * @param	Closure	$callback
	 * @return array
	 */
	 public static function pretend($callback){
		return parent::pretend($callback);
	 }

	/**
	 * Log a query in the connection's query log.
	 *
	 * @static
	 * @param	string	$query
	 * @param	array	$bindings
	 * @param	$time
	 */
	 public static function logQuery($query, $bindings, $time = null){
		parent::logQuery($query, $bindings, $time);
	 }

	/**
	 * Get the currently used PDO connection.
	 *
	 * @static
	 * @return PDO
	 */
	 public static function getPdo(){
		return parent::getPdo();
	 }

	/**
	 * Get the database connection name.
	 *
	 * @static
	 * @return string|null
	 */
	 public static function getName(){
		return parent::getName();
	 }

	/**
	 * Get an option from the configuration options.
	 *
	 * @static
	 * @param	string	$option
	 * @return mixed
	 */
	 public static function getConfig($option){
		return parent::getConfig($option);
	 }

	/**
	 * Get the PDO driver name.
	 *
	 * @static
	 * @return string
	 */
	 public static function getDriverName(){
		return parent::getDriverName();
	 }

	/**
	 * Get the query grammar used by the connection.
	 *
	 * @static
	 * @return Illuminate\Database\Query\Grammars\Grammar
	 */
	 public static function getQueryGrammar(){
		return parent::getQueryGrammar();
	 }

	/**
	 * Set the query grammar used by the connection.
	 *
	 * @static
	 * @param	Illuminate\Database\Query\Grammars\Grammar
	 */
	 public static function setQueryGrammar($grammar){
		parent::setQueryGrammar($grammar);
	 }

	/**
	 * Get the schema grammar used by the connection.
	 *
	 * @static
	 * @return Illuminate\Database\Query\Grammars\Grammar
	 */
	 public static function getSchemaGrammar(){
		return parent::getSchemaGrammar();
	 }

	/**
	 * Set the schema grammar used by the connection.
	 *
	 * @static
	 * @param	Illuminate\Database\Schema\Grammars\Grammar
	 */
	 public static function setSchemaGrammar($grammar){
		parent::setSchemaGrammar($grammar);
	 }

	/**
	 * Get the query post processor used by the connection.
	 *
	 * @static
	 * @return Illuminate\Database\Query\Processors\Processor
	 */
	 public static function getPostProcessor(){
		return parent::getPostProcessor();
	 }

	/**
	 * Set the query post processor used by the connection.
	 *
	 * @static
	 * @param	Illuminate\Database\Query\Processors\Processor
	 */
	 public static function setPostProcessor($processor){
		parent::setPostProcessor($processor);
	 }

	/**
	 * Get the event dispatcher used by the connection.
	 *
	 * @static
	 * @return Illuminate\Events\Dispatcher
	 */
	 public static function getEventDispatcher(){
		return parent::getEventDispatcher();
	 }

	/**
	 * Set the event dispatcher instance on the connection.
	 *
	 * @static
	 * @param	Illuminate\Events\Dispatcher
	 */
	 public static function setEventDispatcher($events){
		parent::setEventDispatcher($events);
	 }

	/**
	 * Get the paginator environment instance.
	 *
	 * @static
	 * @return Illuminate\Pagination\Environment
	 */
	 public static function getPaginator(){
		return parent::getPaginator();
	 }

	/**
	 * Set the pagination environment instance.
	 *
	 * @static
	 * @param	Illuminate\Pagination\Environment|Closure	$paginator
	 */
	 public static function setPaginator($paginator){
		parent::setPaginator($paginator);
	 }

	/**
	 * Determine if the connection in a "dry run".
	 *
	 * @static
	 * @return bool
	 */
	 public static function pretending(){
		return parent::pretending();
	 }

	/**
	 * Get the default fetch mode for the connection.
	 *
	 * @static
	 * @return int
	 */
	 public static function getFetchMode(){
		return parent::getFetchMode();
	 }

	/**
	 * Set the default fetch mode for the connection.
	 *
	 * @static
	 * @param	int	$fetchMode
	 * @return int
	 */
	 public static function setFetchMode($fetchMode){
		return parent::setFetchMode($fetchMode);
	 }

	/**
	 * Get the connection query log.
	 *
	 * @static
	 * @return array
	 */
	 public static function getQueryLog(){
		return parent::getQueryLog();
	 }

	/**
	 * Clear the query log.
	 *
	 * @static
	 */
	 public static function flushQueryLog(){
		parent::flushQueryLog();
	 }

	/**
	 * Get the name of the connected database.
	 *
	 * @static
	 * @return string
	 */
	 public static function getDatabaseName(){
		return parent::getDatabaseName();
	 }

	/**
	 * Set the name of the connected database.
	 *
	 * @static
	 * @param	string	$database
	 * @return string
	 */
	 public static function setDatabaseName($database){
		return parent::setDatabaseName($database);
	 }

	/**
	 * Get the table prefix for the connection.
	 *
	 * @static
	 * @return string
	 */
	 public static function getTablePrefix(){
		return parent::getTablePrefix();
	 }

	/**
	 * Set the table prefix in use by the connection.
	 *
	 * @static
	 * @param	string	$prefix
	 */
	 public static function setTablePrefix($prefix){
		parent::setTablePrefix($prefix);
	 }

	/**
	 * Set the table prefix and return the grammar.
	 *
	 * @static
	 * @param	Illuminate\Database\Grammar	$grammar
	 * @return Illuminate\Database\Grammar
	 */
	 public static function withTablePrefix($grammar){
		return parent::withTablePrefix($grammar);
	 }

 }
}

namespace  {
 class Queue extends Illuminate\Queue\QueueInterface{
	/**
	 * Push a new job onto the queue.
	 *
	 * @static
	 * @param	string	$job
	 * @param	mixed	$data
	 * @param	string	$queue
	 */
	 public static function push($job, $data = '', $queue = null){
		parent::push($job, $data, $queue);
	 }

	/**
	 * Push a new job onto the queue after a delay.
	 *
	 * @static
	 * @param	int	$delay
	 * @param	string	$job
	 * @param	mixed	$data
	 * @param	string	$queue
	 */
	 public static function later($delay, $job, $data = '', $queue = null){
		parent::later($delay, $job, $data, $queue);
	 }

	/**
	 * Pop the next job off of the queue.
	 *
	 * @static
	 * @param	string	$queue
	 * @return Illuminate\Queue\Jobs\Job|nul
	 */
	 public static function pop($queue = null){
		return parent::pop($queue);
	 }

 }
}

namespace  {
 class Redis extends Illuminate\Redis\Database{
	/**
	 * Create a new Redis connection instance.
	 *
	 * @static
	 * @param	string	$host
	 * @param	int	$port
	 * @param	int	$database
	 * @param	string	$password
	 */
	 public static function __construct($host, $port, $database = 0, $password = null){
		parent::__construct($host, $port, $database, $password);
	 }

	/**
	 * Connect to the Redis database.
	 *
	 * @static
	 */
	 public static function connect(){
		parent::connect();
	 }

	/**
	 * Run a command against the Redis database.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function command($method, $parameters = array()){
		return parent::command($method, $parameters);
	 }

	/**
	 * Build the Redis command syntax.
	 * 
	 * Redis protocol states that a command should conform to the following format:
	 * 
	 * *<number of arguments> CR LF
	 * $<number of bytes of argument 1> CR LF
	 * <argument data> CR LF
	 * ...
	 * $<number of bytes of argument N> CR LF
	 * <argument data> CR LF
	 * 
	 * More information regarding the Redis protocol: http://redis.io/topics/protocol
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return string
	 */
	 public static function buildCommand($method, $parameters){
		return parent::buildCommand($method, $parameters);
	 }

	/**
	 * Parse the Redis database response.
	 *
	 * @static
	 * @param	string	$response
	 * @return mixed
	 */
	 public static function parseResponse($response){
		return parent::parseResponse($response);
	 }

	/**
	 * Read the specified number of bytes from the file resource.
	 *
	 * @static
	 * @param	int	$bytes
	 * @return string
	 */
	 public static function fileRead($bytes){
		return parent::fileRead($bytes);
	 }

	/**
	 * Get the specified number of bytes from a file line.
	 *
	 * @static
	 * @param	int	$bytes
	 * @return string
	 */
	 public static function fileGet($bytes){
		return parent::fileGet($bytes);
	 }

	/**
	 * Write the given command to the file resource.
	 *
	 * @static
	 * @param	string	$command
	 */
	 public static function fileWrite($command){
		parent::fileWrite($command);
	 }

	/**
	 * Get the Redis socket connection.
	 *
	 * @static
	 * @return resource
	 */
	 public static function getConnection(){
		return parent::getConnection();
	 }

	/**
	 * Dynamically make a Redis command.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function __call($method, $parameters){
		return parent::__call($method, $parameters);
	 }

 }
}

namespace  {
 class App extends Illuminate\Foundation\Application{
	/**
	 * Create a new Illuminate application instance.
	 *
	 * @static
	 */
	 public static function __construct(){
		parent::__construct();
	 }

	/**
	 * Bind the installation paths to the application.
	 *
	 * @static
	 * @param	array	$paths
	 */
	 public static function bindInstallPaths($paths){
		parent::bindInstallPaths($paths);
	 }

	/**
	 * Get the application bootstrap file.
	 *
	 * @static
	 * @return string
	 */
	 public static function getBootstrapFile(){
		return parent::getBootstrapFile();
	 }

	/**
	 * Register the aliased class loader.
	 *
	 * @static
	 * @param	array	$aliases
	 */
	 public static function registerAliasLoader($aliases){
		parent::registerAliasLoader($aliases);
	 }

	/**
	 * Start the exception handling for the request.
	 *
	 * @static
	 */
	 public static function startExceptionHandling(){
		parent::startExceptionHandling();
	 }

	/**
	 * Get the current application environment.
	 *
	 * @static
	 * @return string
	 */
	 public static function environment(){
		return parent::environment();
	 }

	/**
	 * Detect the application's current environment.
	 *
	 * @static
	 * @param	array|string	$environments
	 * @return string
	 */
	 public static function detectEnvironment($environments){
		return parent::detectEnvironment($environments);
	 }

	/**
	 * Determine if we are running in the console.
	 *
	 * @static
	 * @return bool
	 */
	 public static function runningInConsole(){
		return parent::runningInConsole();
	 }

	/**
	 * Determine if we are running unit tests.
	 *
	 * @static
	 * @return bool
	 */
	 public static function runningUnitTests(){
		return parent::runningUnitTests();
	 }

	/**
	 * Register a service provider with the application.
	 *
	 * @static
	 * @param	Illuminate\Support\ServiceProvider|string	$provider
	 * @param	array	$options
	 */
	 public static function register($provider, $options = array()){
		parent::register($provider, $options);
	 }

	/**
	 * Load and boot all of the remaining deferred providers.
	 *
	 * @static
	 */
	 public static function loadDeferredProviders(){
		parent::loadDeferredProviders();
	 }

	/**
	 * Resolve the given type from the container.
	 * 
	 * (Overriding Container::make)
	 *
	 * @static
	 * @param	string	$abstract
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function make($abstract, $parameters = array()){
		return parent::make($abstract, $parameters);
	 }

	/**
	 * Register a "before" application filter.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 */
	 public static function before($callback){
		parent::before($callback);
	 }

	/**
	 * Register an "after" application filter.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 */
	 public static function after($callback){
		parent::after($callback);
	 }

	/**
	 * Register a "close" application filter.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 */
	 public static function close($callback){
		parent::close($callback);
	 }

	/**
	 * Register a "finish" application filter.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 */
	 public static function finish($callback){
		parent::finish($callback);
	 }

	/**
	 * Register a "shutdown" callback.
	 *
	 * @static
	 * @param	callable	$callback
	 */
	 public static function shutdown($callback = null){
		parent::shutdown($callback);
	 }

	/**
	 * Handles the given request and delivers the response.
	 *
	 * @static
	 */
	 public static function run(){
		parent::run();
	 }

	/**
	 * Handle the given request and get the response.
	 *
	 * @static
	 * @param	Illuminate\Http\Request	$request
	 * @return Symfony\Component\HttpFoundation\Response
	 */
	 public static function dispatch($request){
		return parent::dispatch($request);
	 }

	/**
	 * Handle the given request and get the response.
	 * 
	 * Provides compatibility with BrowserKit functional testing.
	 *
	 * @static
	 * @param	Illuminate\Http\Request	$request
	 * @param	int	$type
	 * @param	bool	$catch
	 * @return Symfony\Component\HttpFoundation\Response
	 */
	 public static function handle($request, $type = 1, $catch = true){
		return parent::handle($request, $type, $catch);
	 }

	/**
	 * Boot the application's service providers.
	 *
	 * @static
	 */
	 public static function boot(){
		parent::boot();
	 }

	/**
	 * Register a new boot listener.
	 *
	 * @static
	 * @param	mixed	$callback
	 */
	 public static function booting($callback){
		parent::booting($callback);
	 }

	/**
	 * Register a new "booted" listener.
	 *
	 * @static
	 * @param	mixed	$callback
	 */
	 public static function booted($callback){
		parent::booted($callback);
	 }

	/**
	 * Prepare the request by injecting any services.
	 *
	 * @static
	 * @param	Illuminate\Http\Request	$request
	 * @return Illuminate\Http\Request
	 */
	 public static function prepareRequest($request){
		return parent::prepareRequest($request);
	 }

	/**
	 * Prepare the given value as a Response object.
	 *
	 * @static
	 * @param	mixed	$value
	 * @param	Illuminate\Http\Request	$request
	 * @return Symfony\Component\HttpFoundation\Response
	 */
	 public static function prepareResponse($value, $request){
		return parent::prepareResponse($value, $request);
	 }

	/**
	 * Set the current application locale.
	 *
	 * @static
	 * @param	string	$locale
	 */
	 public static function setLocale($locale){
		parent::setLocale($locale);
	 }

	/**
	 * Throw an HttpException with the given data.
	 *
	 * @static
	 * @param	int	$code
	 * @param	string	$message
	 * @param	array	$headers
	 */
	 public static function abort($code, $message = '', $headers = array()){
		parent::abort($code, $message, $headers);
	 }

	/**
	 * Register a 404 error handler.
	 *
	 * @static
	 * @param	Closure	$callback
	 */
	 public static function missing($callback){
		parent::missing($callback);
	 }

	/**
	 * Register an application error handler.
	 *
	 * @static
	 * @param	Closure	$callback
	 */
	 public static function error($callback){
		parent::error($callback);
	 }

	/**
	 * Register an error handler for fatal errors.
	 *
	 * @static
	 * @param	Closure	$callback
	 */
	 public static function fatal($callback){
		parent::fatal($callback);
	 }

	/**
	 * Get the service providers that have been loaded.
	 *
	 * @static
	 * @return array
	 */
	 public static function getLoadedProviders(){
		return parent::getLoadedProviders();
	 }

	/**
	 * Set the application's deferred services.
	 *
	 * @static
	 * @param	array	$services
	 */
	 public static function setDeferredServices($services){
		parent::setDeferredServices($services);
	 }

	/**
	 * Dynamically access application services.
	 *
	 * @static
	 * @param	string	$key
	 * @return mixed
	 */
	 public static function __get($key){
		return parent::__get($key);
	 }

	/**
	 * Dynamically set application services.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 */
	 public static function __set($key, $value){
		parent::__set($key, $value);
	 }

	/**
	 * Determine if the given abstract type has been bound.
	 *
	 * @static
	 * @param	string	$abstract
	 * @return bool
	 */
	 public static function bound($abstract){
		return parent::bound($abstract);
	 }

	/**
	 * Register a binding with the container.
	 *
	 * @static
	 * @param	string	$abstract
	 * @param	Closure|string|null	$concrete
	 * @param	bool	$shared
	 */
	 public static function bind($abstract, $concrete = null, $shared = false){
		parent::bind($abstract, $concrete, $shared);
	 }

	/**
	 * Register a binding if it hasn't already been registered.
	 *
	 * @static
	 * @param	string	$abstract
	 * @param	Closure|string|null	$concrete
	 * @param	bool	$shared
	 * @return bool
	 */
	 public static function bindIf($abstract, $concrete = null, $shared = false){
		return parent::bindIf($abstract, $concrete, $shared);
	 }

	/**
	 * Register a shared binding in the container.
	 *
	 * @static
	 * @param	string	$abstract
	 * @param	Closure|string|null	$concrete
	 */
	 public static function singleton($abstract, $concrete = null){
		parent::singleton($abstract, $concrete);
	 }

	/**
	 * Wrap a Closure such that it is shared.
	 *
	 * @static
	 * @param	Closure	$closure
	 * @return Closure
	 */
	 public static function share($closure){
		return parent::share($closure);
	 }

	/**
	 * "Extend" an abstract type in the container.
	 *
	 * @static
	 * @param	string	$abstract
	 * @param	Closure	$closure
	 */
	 public static function extend($abstract, $closure){
		parent::extend($abstract, $closure);
	 }

	/**
	 * Register an existing instance as shared in the container.
	 *
	 * @static
	 * @param	string	$abstract
	 * @param	mixed	$instance
	 */
	 public static function instance($abstract, $instance){
		parent::instance($abstract, $instance);
	 }

	/**
	 * Alias a type to a shorter name.
	 *
	 * @static
	 * @param	string	$abstract
	 * @param	string	$alias
	 */
	 public static function alias($abstract, $alias){
		parent::alias($abstract, $alias);
	 }

	/**
	 * Instantiate a concrete instance of the given type.
	 *
	 * @static
	 * @param	string	$concrete
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function build($concrete, $parameters = array()){
		return parent::build($concrete, $parameters);
	 }

	/**
	 * Register a new resolving callback.
	 *
	 * @static
	 * @param	Closure	$callback
	 */
	 public static function resolving($callback){
		parent::resolving($callback);
	 }

	/**
	 * Get the container's bindings.
	 *
	 * @static
	 * @return array
	 */
	 public static function getBindings(){
		return parent::getBindings();
	 }

	/**
	 * Determine if a given offset exists.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function offsetExists($key){
		return parent::offsetExists($key);
	 }

	/**
	 * Get the value at a given offset.
	 *
	 * @static
	 * @param	string	$key
	 * @return mixed
	 */
	 public static function offsetGet($key){
		return parent::offsetGet($key);
	 }

	/**
	 * Set the value at a given offset.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 */
	 public static function offsetSet($key, $value){
		parent::offsetSet($key, $value);
	 }

	/**
	 * Unset the value at a given offset.
	 *
	 * @static
	 * @param	string	$key
	 */
	 public static function offsetUnset($key){
		parent::offsetUnset($key);
	 }

 }
}

namespace  {
 class Artisan extends Illuminate\Console\Application{
	/**
	 * Start a new Console application.
	 *
	 * @static
	 * @param	Illuminate\Foundation\Application	$app
	 * @return Illuminate\Console\Application
	 */
	 public static function start($app){
		return parent::start($app);
	 }

	/**
	 * Add a command to the console.
	 *
	 * @static
	 * @param	Symfony\Component\Console\Command\Command	$command
	 * @return Symfony\Component\Console\Command\Command
	 */
	 public static function add($command){
		return parent::add($command);
	 }

	/**
	 * Add a command, resolving through the application.
	 *
	 * @static
	 * @param	string	$command
	 */
	 public static function resolve($command){
		parent::resolve($command);
	 }

	/**
	 * Resolve an array of commands through the application.
	 *
	 * @static
	 * @param	array|dynamic	$commands
	 */
	 public static function resolveCommands($commands){
		parent::resolveCommands($commands);
	 }

	/**
	 * Render the given exception.
	 *
	 * @static
	 * @param	Exception	$e
	 * @param	Symfony\Component\Console\Output\OutputInterface	$output
	 */
	 public static function renderException($e, $output){
		parent::renderException($e, $output);
	 }

	/**
	 * Set the exception handler instance.
	 *
	 * @static
	 * @param	Illuminate\Exception\Handler	$handler
	 */
	 public static function setExceptionHandler($handler){
		parent::setExceptionHandler($handler);
	 }

	/**
	 * Set the Laravel application instance.
	 *
	 * @static
	 * @param	Illuminate\Foundation\Application	$laravel
	 */
	 public static function setLaravel($laravel){
		parent::setLaravel($laravel);
	 }

	/**
	 * Constructor.
	 *
	 * @static
	 * @param	string $name	The name of the application
	 * @param	string $version The version of the application

	 */
	 public static function __construct($name = 'UNKNOWN', $version = 'UNKNOWN'){
		parent::__construct($name, $version);
	 }

	/**
	 * Runs the current application.
	 *
	 * @static
	 * @param	InputInterface	$input	An Input instance
	 * @param	OutputInterface $output An Output instance

	 * @return integer 0 if everything went fine, or an error code

	 */
	 public static function run($input = null, $output = null){
		return parent::run($input, $output);
	 }

	/**
	 * Runs the current application.
	 *
	 * @static
	 * @param	InputInterface	$input	An Input instance
	 * @param	OutputInterface $output An Output instance

	 * @return integer 0 if everything went fine, or an error code
	 */
	 public static function doRun($input, $output){
		return parent::doRun($input, $output);
	 }

	/**
	 * Set a helper set to be used with the command.
	 *
	 * @static
	 * @param	HelperSet $helperSet The helper set

	 */
	 public static function setHelperSet($helperSet){
		parent::setHelperSet($helperSet);
	 }

	/**
	 * Get the helper set associated with the command.
	 *
	 * @static
	 * @return HelperSet The HelperSet instance associated with this command

	 */
	 public static function getHelperSet(){
		return parent::getHelperSet();
	 }

	/**
	 * Set an input definition set to be used with this application
	 *
	 * @static
	 * @param	InputDefinition $definition The input definition

	 */
	 public static function setDefinition($definition){
		parent::setDefinition($definition);
	 }

	/**
	 * Gets the InputDefinition related to this Application.
	 *
	 * @static
	 * @return InputDefinition The InputDefinition instance
	 */
	 public static function getDefinition(){
		return parent::getDefinition();
	 }

	/**
	 * Gets the help message.
	 *
	 * @static
	 * @return string A help message.
	 */
	 public static function getHelp(){
		return parent::getHelp();
	 }

	/**
	 * Sets whether to catch exceptions or not during commands execution.
	 *
	 * @static
	 * @param	Boolean $boolean Whether to catch exceptions or not during commands execution

	 */
	 public static function setCatchExceptions($boolean){
		parent::setCatchExceptions($boolean);
	 }

	/**
	 * Sets whether to automatically exit after a command execution or not.
	 *
	 * @static
	 * @param	Boolean $boolean Whether to automatically exit after a command execution or not

	 */
	 public static function setAutoExit($boolean){
		parent::setAutoExit($boolean);
	 }

	/**
	 * Gets the name of the application.
	 *
	 * @static
	 * @return string The application name

	 */
	 public static function getName(){
		return parent::getName();
	 }

	/**
	 * Sets the application name.
	 *
	 * @static
	 * @param	string $name The application name

	 */
	 public static function setName($name){
		parent::setName($name);
	 }

	/**
	 * Gets the application version.
	 *
	 * @static
	 * @return string The application version

	 */
	 public static function getVersion(){
		return parent::getVersion();
	 }

	/**
	 * Sets the application version.
	 *
	 * @static
	 * @param	string $version The application version

	 */
	 public static function setVersion($version){
		parent::setVersion($version);
	 }

	/**
	 * Returns the long version of the application.
	 *
	 * @static
	 * @return string The long application version

	 */
	 public static function getLongVersion(){
		return parent::getLongVersion();
	 }

	/**
	 * Registers a new command.
	 *
	 * @static
	 * @param	string $name The command name

	 * @return Command The newly created command

	 */
	 public static function register($name){
		return parent::register($name);
	 }

	/**
	 * Adds an array of command objects.
	 *
	 * @static
	 * @param	Command[] $commands An array of commands

	 */
	 public static function addCommands($commands){
		parent::addCommands($commands);
	 }

	/**
	 * Returns a registered command by name or alias.
	 *
	 * @static
	 * @param	string $name The command name or alias

	 * @return Command A Command object

	 */
	 public static function get($name){
		return parent::get($name);
	 }

	/**
	 * Returns true if the command exists, false otherwise.
	 *
	 * @static
	 * @param	string $name The command name or alias

	 * @return Boolean true if the command exists, false otherwise

	 */
	 public static function has($name){
		return parent::has($name);
	 }

	/**
	 * Returns an array of all unique namespaces used by currently registered commands.
	 * 
	 * It does not returns the global namespace which always exists.
	 *
	 * @static
	 * @return array An array of namespaces
	 */
	 public static function getNamespaces(){
		return parent::getNamespaces();
	 }

	/**
	 * Finds a registered namespace by a name or an abbreviation.
	 *
	 * @static
	 * @param	string $namespace A namespace or abbreviation to search for

	 * @return string A registered namespace

	 */
	 public static function findNamespace($namespace){
		return parent::findNamespace($namespace);
	 }

	/**
	 * Finds a command by name or alias.
	 * 
	 * Contrary to get, this command tries to find the best
	 * match if you give it an abbreviation of a name or alias.
	 *
	 * @static
	 * @param	string $name A command name or a command alias

	 * @return Command A Command instance

	 */
	 public static function find($name){
		return parent::find($name);
	 }

	/**
	 * Gets the commands (registered in the given namespace if provided).
	 * 
	 * The array keys are the full names and the values the command instances.
	 *
	 * @static
	 * @param	string $namespace A namespace name

	 * @return Command[] An array of Command instances

	 */
	 public static function all($namespace = null){
		return parent::all($namespace);
	 }

	/**
	 * Returns an array of possible abbreviations given a set of names.
	 *
	 * @static
	 * @param	array $names An array of names

	 * @return array An array of abbreviations
	 */
	 public static function getAbbreviations($names){
		return parent::getAbbreviations($names);
	 }

	/**
	 * Returns a text representation of the Application.
	 *
	 * @static
	 * @param	string	$namespace An optional namespace name
	 * @param	boolean $raw	Whether to return raw command list

	 * @return string A string representing the Application
	 */
	 public static function asText($namespace = null, $raw = false){
		return parent::asText($namespace, $raw);
	 }

	/**
	 * Returns an XML representation of the Application.
	 *
	 * @static
	 * @param	string	$namespace An optional namespace name
	 * @param	Boolean $asDom	Whether to return a DOM or an XML string

	 * @return string|DOMDocument An XML string representing the Application
	 */
	 public static function asXml($namespace = null, $asDom = false){
		return parent::asXml($namespace, $asDom);
	 }

	/**
	 * Tries to figure out the terminal dimensions based on the current environment
	 *
	 * @static
	 * @return array Array containing width and height
	 */
	 public static function getTerminalDimensions(){
		return parent::getTerminalDimensions();
	 }

 }
}

namespace  {
 class Blade extends Illuminate\View\Compilers\BladeCompiler{
	/**
	 * Compile the view at the given path.
	 *
	 * @static
	 * @param	string	$path
	 */
	 public static function compile($path){
		parent::compile($path);
	 }

	/**
	 * Compile the given Blade template contents.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function compileString($value){
		return parent::compileString($value);
	 }

	/**
	 * Register a custom Blade compiler.
	 *
	 * @static
	 * @param	Closure	$compiler
	 */
	 public static function extend($compiler){
		parent::extend($compiler);
	 }

	/**
	 * Get the regular expression for a generic Blade function.
	 *
	 * @static
	 * @param	string	$function
	 * @return string
	 */
	 public static function createMatcher($function){
		return parent::createMatcher($function);
	 }

	/**
	 * Get the regular expression for a generic Blade function.
	 *
	 * @static
	 * @param	string	$function
	 * @return string
	 */
	 public static function createOpenMatcher($function){
		return parent::createOpenMatcher($function);
	 }

	/**
	 * Create a plain Blade matcher.
	 *
	 * @static
	 * @param	string	$function
	 * @return string
	 */
	 public static function createPlainMatcher($function){
		return parent::createPlainMatcher($function);
	 }

	/**
	 * Sets the content tags used for the compiler.
	 *
	 * @static
	 * @param	string	$openTag
	 * @param	string	$closeTag
	 * @param	bool	$raw
	 */
	 public static function setContentTags($openTag, $closeTag, $raw = false){
		parent::setContentTags($openTag, $closeTag, $raw);
	 }

	/**
	 * Sets the raw content tags used for the compiler.
	 *
	 * @static
	 * @param	string	$openTag
	 * @param	string	$closeTag
	 */
	 public static function setEscapedContentTags($openTag, $closeTag){
		parent::setEscapedContentTags($openTag, $closeTag);
	 }

	/**
	 * Create a new compiler instance.
	 *
	 * @static
	 * @param	Illuminate\Filesystem\Filesystem	$files
	 * @param	string	$cachePath
	 */
	 public static function __construct($files, $cachePath){
		parent::__construct($files, $cachePath);
	 }

	/**
	 * Get the path to the compiled version of a view.
	 *
	 * @static
	 * @param	string	$path
	 * @return string
	 */
	 public static function getCompiledPath($path){
		return parent::getCompiledPath($path);
	 }

	/**
	 * Determine if the view at the given path is expired.
	 *
	 * @static
	 * @param	string	$path
	 * @return bool
	 */
	 public static function isExpired($path){
		return parent::isExpired($path);
	 }

 }
}

namespace  {
 class ClassLoader extends Illuminate\Support\ClassLoader{
	/**
	 * Load the given class file.
	 *
	 * @static
	 * @param	string	$class
	 */
	 public static function load($class){
		parent::load($class);
	 }

	/**
	 * Get the normal file name for a class.
	 *
	 * @static
	 * @param	string	$class
	 * @return string
	 */
	 public static function normalizeClass($class){
		return parent::normalizeClass($class);
	 }

	/**
	 * Register the given class loader on the auto-loader stack.
	 *
	 * @static
	 */
	 public static function register(){
		parent::register();
	 }

	/**
	 * Add directories to the class loader.
	 *
	 * @static
	 * @param	string|array	$directories
	 */
	 public static function addDirectories($directories){
		parent::addDirectories($directories);
	 }

	/**
	 * Remove directories from the class loader.
	 *
	 * @static
	 * @param	string|array	$directories
	 */
	 public static function removeDirectories($directories = null){
		parent::removeDirectories($directories);
	 }

	/**
	 * Gets all the directories registered with the loader.
	 *
	 * @static
	 * @return array
	 */
	 public static function getDirectories(){
		return parent::getDirectories();
	 }

 }
}

namespace  {
 class Config extends Illuminate\Config\Repository{
	/**
	 * Create a new configuration repository.
	 *
	 * @static
	 * @param	Illuminate\Config\LoaderInterface	$loader
	 * @param	string	$environment
	 */
	 public static function __construct($loader, $environment){
		parent::__construct($loader, $environment);
	 }

	/**
	 * Determine if the given configuration value exists.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function has($key){
		return parent::has($key);
	 }

	/**
	 * Determine if a configuration group exists.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function hasGroup($key){
		return parent::hasGroup($key);
	 }

	/**
	 * Get the specified configuration value.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return mixed
	 */
	 public static function get($key, $default = null){
		return parent::get($key, $default);
	 }

	/**
	 * Set a given configuration value.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 */
	 public static function set($key, $value){
		parent::set($key, $value);
	 }

	/**
	 * Register a package for cascading configuration.
	 *
	 * @static
	 * @param	string	$package
	 * @param	string	$hint
	 * @param	string	$namespace
	 */
	 public static function package($package, $hint, $namespace = null){
		parent::package($package, $hint, $namespace);
	 }

	/**
	 * Register an after load callback for a given namespace.
	 *
	 * @static
	 * @param	string	$namespace
	 * @param	Closure	$callback
	 */
	 public static function afterLoading($namespace, $callback){
		parent::afterLoading($namespace, $callback);
	 }

	/**
	 * Add a new namespace to the loader.
	 *
	 * @static
	 * @param	string	$namespace
	 * @param	string	$hint
	 */
	 public static function addNamespace($namespace, $hint){
		parent::addNamespace($namespace, $hint);
	 }

	/**
	 * Returns all registered namespaces with the config
	 * loader.
	 *
	 * @static
	 * @return array
	 */
	 public static function getNamespaces(){
		return parent::getNamespaces();
	 }

	/**
	 * Get the loader implementation.
	 *
	 * @static
	 * @return Illuminate\Config\LoaderInterface
	 */
	 public static function getLoader(){
		return parent::getLoader();
	 }

	/**
	 * Set the loader implementation.
	 *
	 * @static
	 * @param	Illuminate\Config\LoaderInterface	$loader
	 */
	 public static function setLoader($loader){
		parent::setLoader($loader);
	 }

	/**
	 * Get the current configuration environment.
	 *
	 * @static
	 * @return string
	 */
	 public static function getEnvironment(){
		return parent::getEnvironment();
	 }

	/**
	 * Get the after load callback array.
	 *
	 * @static
	 * @return array
	 */
	 public static function getAfterLoadCallbacks(){
		return parent::getAfterLoadCallbacks();
	 }

	/**
	 * Get all of the configuration items.
	 *
	 * @static
	 * @return array
	 */
	 public static function getItems(){
		return parent::getItems();
	 }

	/**
	 * Determine if the given configuration option exists.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function offsetExists($key){
		return parent::offsetExists($key);
	 }

	/**
	 * Get a configuration option.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function offsetGet($key){
		return parent::offsetGet($key);
	 }

	/**
	 * Set a configuration option.
	 *
	 * @static
	 * @param	string	$key
	 * @param	string	$value
	 */
	 public static function offsetSet($key, $value){
		parent::offsetSet($key, $value);
	 }

	/**
	 * Unset a configuration option.
	 *
	 * @static
	 * @param	string	$key
	 */
	 public static function offsetUnset($key){
		parent::offsetUnset($key);
	 }

	/**
	 * Parse a key into namespace, group, and item.
	 *
	 * @static
	 * @param	string	$key
	 * @return array
	 */
	 public static function parseKey($key){
		return parent::parseKey($key);
	 }

	/**
	 * Set the parsed value of a key.
	 *
	 * @static
	 * @param	string	$key
	 * @param	array	$parsed
	 */
	 public static function setParsedKey($key, $parsed){
		parent::setParsedKey($key, $parsed);
	 }

 }
}

namespace  {
 class Controller extends Illuminate\Routing\Controllers\Controller{
	/**
	 * Register a new "before" filter on the controller.
	 *
	 * @static
	 * @param	string	$filter
	 * @param	array	$options
	 */
	 public static function beforeFilter($filter, $options = array()){
		parent::beforeFilter($filter, $options);
	 }

	/**
	 * Register a new "after" filter on the controller.
	 *
	 * @static
	 * @param	string	$filter
	 * @param	array	$options
	 */
	 public static function afterFilter($filter, $options = array()){
		parent::afterFilter($filter, $options);
	 }

	/**
	 * Execute an action on the controller.
	 *
	 * @static
	 * @param	Illuminate\Container\Container	$container
	 * @param	Illuminate\Routing\Router	$router
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return Symfony\Component\HttpFoundation\Response
	 */
	 public static function callAction($container, $router, $method, $parameters){
		return parent::callAction($container, $router, $method, $parameters);
	 }

	/**
	 * Get the code registered filters.
	 *
	 * @static
	 * @return array
	 */
	 public static function getControllerFilters(){
		return parent::getControllerFilters();
	 }

	/**
	 * Handle calls to missing methods on the controller.
	 *
	 * @static
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function missingMethod($parameters){
		return parent::missingMethod($parameters);
	 }

	/**
	 * Handle calls to missing methods on the controller.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function __call($method, $parameters){
		return parent::__call($method, $parameters);
	 }

 }
}

namespace  {
 class Cookie extends Illuminate\Cookie\CookieJar{
	/**
	 * Create a new cookie manager instance.
	 *
	 * @static
	 * @param	Symfony\Component\HttpFoundation\Request	$request
	 * @param	Illuminate\Encryption\Encrypter	$encrypter
	 */
	 public static function __construct($request, $encrypter){
		parent::__construct($request, $encrypter);
	 }

	/**
	 * Determine if a cookie exists and is not null.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function has($key){
		return parent::has($key);
	 }

	/**
	 * Get the value of the given cookie.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return mixed
	 */
	 public static function get($key, $default = null){
		return parent::get($key, $default);
	 }

	/**
	 * Create a new cookie instance.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	int	$minutes
	 * @param	string	$path
	 * @param	string	$domain
	 * @param	bool	$secure
	 * @param	bool	$httpOnly
	 * @return Symfony\Component\HttpFoundation\Cookie
	 */
	 public static function make($name, $value, $minutes = 0, $path = null, $domain = null, $secure = false, $httpOnly = true){
		return parent::make($name, $value, $minutes, $path, $domain, $secure, $httpOnly);
	 }

	/**
	 * Create a cookie that lasts "forever" (five years).
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	string	$path
	 * @param	string	$domain
	 * @param	bool	$secure
	 * @param	bool	$httpOnly
	 * @return Symfony\Component\HttpFoundation\Cookie
	 */
	 public static function forever($name, $value, $path = null, $domain = null, $secure = false, $httpOnly = true){
		return parent::forever($name, $value, $path, $domain, $secure, $httpOnly);
	 }

	/**
	 * Expire the given cookie.
	 *
	 * @static
	 * @param	string	$name
	 * @return Symfony\Component\HttpFoundation\Cookie
	 */
	 public static function forget($name){
		return parent::forget($name);
	 }

	/**
	 * Set the default path and domain for the jar.
	 *
	 * @static
	 * @param	string	$path
	 * @param	string	$domain
	 */
	 public static function setDefaultPathAndDomain($path, $domain){
		parent::setDefaultPathAndDomain($path, $domain);
	 }

	/**
	 * Get the request instance.
	 *
	 * @static
	 * @return Symfony\Component\HttpFoundation\Request
	 */
	 public static function getRequest(){
		return parent::getRequest();
	 }

	/**
	 * Get the encrypter instance.
	 *
	 * @static
	 * @return Illuminate\Encryption\Encrypter
	 */
	 public static function getEncrypter(){
		return parent::getEncrypter();
	 }

 }
}

namespace  {
 class Crypt extends Illuminate\Encryption\Encrypter{
	/**
	 * Create a new encrypter instance.
	 *
	 * @static
	 * @param	string	$key
	 */
	 public static function __construct($key){
		parent::__construct($key);
	 }

	/**
	 * Encrypt the given value.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function encrypt($value){
		return parent::encrypt($value);
	 }

	/**
	 * Decrypt the given value.
	 *
	 * @static
	 * @param	string	$payload
	 * @return string
	 */
	 public static function decrypt($payload){
		return parent::decrypt($payload);
	 }

 }
}

namespace  {
 class Eloquent extends Illuminate\Database\Eloquent\Model{
	/**
	 * Create a new Eloquent model instance.
	 *
	 * @static
	 * @param	array	$attributes
	 */
	 public static function __construct($attributes = array()){
		parent::__construct($attributes);
	 }

	/**
	 * Fill the model with an array of attributes.
	 *
	 * @static
	 * @param	array	$attributes
	 * @return Illuminate\Database\Eloquent\Model
	 */
	 public static function fill($attributes){
		return parent::fill($attributes);
	 }

	/**
	 * Create a new instance of the given model.
	 *
	 * @static
	 * @param	array	$attributes
	 * @param	bool	$exists
	 * @return Illuminate\Database\Eloquent\Model
	 */
	 public static function newInstance($attributes = array(), $exists = false){
		return parent::newInstance($attributes, $exists);
	 }

	/**
	 * Create a new model instance that is existing.
	 *
	 * @static
	 * @param	array	$attributes
	 * @return Illuminate\Database\Eloquent\Model
	 */
	 public static function newFromBuilder($attributes = array()){
		return parent::newFromBuilder($attributes);
	 }

	/**
	 * Save a new model and return the instance.
	 *
	 * @static
	 * @param	array	$attributes
	 * @return Illuminate\Database\Eloquent\Model
	 */
	 public static function create($attributes){
		return parent::create($attributes);
	 }

	/**
	 * Begin querying the model on a given connection.
	 *
	 * @static
	 * @param	string	$connection
	 * @return Illuminate\Database\Eloquent\Builder
	 */
	 public static function on($connection){
		return parent::on($connection);
	 }

	/**
	 * Get all of the models from the database.
	 *
	 * @static
	 * @param	array	$columns
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	 public static function all($columns = array()){
		return parent::all($columns);
	 }

	/**
	 * Find a model by its primary key.
	 *
	 * @static
	 * @param	mixed	$id
	 * @param	array	$columns
	 * @return Illuminate\Database\Eloquent\Model|Collection
	 */
	 public static function find($id, $columns = array()){
		return parent::find($id, $columns);
	 }

	/**
	 * Being querying a model with eager loading.
	 *
	 * @static
	 * @param	array	$relations
	 * @return Illuminate\Database\Eloquent\Builder
	 */
	 public static function with($relations){
		return parent::with($relations);
	 }

	/**
	 * Define a one-to-one relationship.
	 *
	 * @static
	 * @param	string	$related
	 * @param	string	$foreignKey
	 * @return Illuminate\Database\Eloquent\Relations\HasOne
	 */
	 public static function hasOne($related, $foreignKey = null){
		return parent::hasOne($related, $foreignKey);
	 }

	/**
	 * Define a polymorphic one-to-one relationship.
	 *
	 * @static
	 * @param	string	$related
	 * @param	string	$name
	 * @param	string	$type
	 * @param	string	$id
	 * @return Illuminate\Database\Eloquent\Relations\MorphOne
	 */
	 public static function morphOne($related, $name, $type = null, $id = null){
		return parent::morphOne($related, $name, $type, $id);
	 }

	/**
	 * Define an inverse one-to-one or many relationship.
	 *
	 * @static
	 * @param	string	$related
	 * @param	string	$foreignKey
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	 public static function belongsTo($related, $foreignKey = null){
		return parent::belongsTo($related, $foreignKey);
	 }

	/**
	 * Define an polymorphic, inverse one-to-one or many relationship.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$type
	 * @param	string	$id
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	 public static function morphTo($name = null, $type = null, $id = null){
		return parent::morphTo($name, $type, $id);
	 }

	/**
	 * Define a one-to-many relationship.
	 *
	 * @static
	 * @param	string	$related
	 * @param	string	$foreignKey
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
	 public static function hasMany($related, $foreignKey = null){
		return parent::hasMany($related, $foreignKey);
	 }

	/**
	 * Define a polymorphic one-to-many relationship.
	 *
	 * @static
	 * @param	string	$related
	 * @param	string	$name
	 * @param	string	$type
	 * @param	string	$id
	 * @return Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	 public static function morphMany($related, $name, $type = null, $id = null){
		return parent::morphMany($related, $name, $type, $id);
	 }

	/**
	 * Define a many-to-many relationship.
	 *
	 * @static
	 * @param	string	$related
	 * @param	string	$table
	 * @param	string	$foreignKey
	 * @param	string	$otherKey
	 * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	 public static function belongsToMany($related, $table = null, $foreignKey = null, $otherKey = null){
		return parent::belongsToMany($related, $table, $foreignKey, $otherKey);
	 }

	/**
	 * Get the joining table name for a many-to-many relation.
	 *
	 * @static
	 * @param	string	$related
	 * @return string
	 */
	 public static function joiningTable($related){
		return parent::joiningTable($related);
	 }

	/**
	 * Delete the model from the database.
	 *
	 * @static
	 */
	 public static function delete(){
		parent::delete();
	 }

	/**
	 * Register an updating model event with the dispatcher.
	 *
	 * @static
	 * @param	Closure	$callback
	 */
	 public static function updating($callback){
		parent::updating($callback);
	 }

	/**
	 * Register an updated model event with the dispatcher.
	 *
	 * @static
	 * @param	Closure	$callback
	 */
	 public static function updated($callback){
		parent::updated($callback);
	 }

	/**
	 * Register a creating model event with the dispatcher.
	 *
	 * @static
	 * @param	Closure	$callback
	 */
	 public static function creating($callback){
		parent::creating($callback);
	 }

	/**
	 * Register a created model event with the dispatcher.
	 *
	 * @static
	 * @param	Closure	$callback
	 */
	 public static function created($callback){
		parent::created($callback);
	 }

	/**
	 * Save the model to the database.
	 *
	 * @static
	 * @return bool
	 */
	 public static function save(){
		return parent::save();
	 }

	/**
	 * Update the model's update timestamp.
	 *
	 * @static
	 * @return bool
	 */
	 public static function touch(){
		return parent::touch();
	 }

	/**
	 * Set the value of the "created at" attribute.
	 *
	 * @static
	 * @param	mixed	$value
	 */
	 public static function setCreatedAt($value){
		parent::setCreatedAt($value);
	 }

	/**
	 * Set the value of the "updated at" attribute.
	 *
	 * @static
	 * @param	mixed	$value
	 */
	 public static function setUpdatedAt($value){
		parent::setUpdatedAt($value);
	 }

	/**
	 * Get the name of the "created at" column.
	 *
	 * @static
	 * @return string
	 */
	 public static function getCreatedAtColumn(){
		return parent::getCreatedAtColumn();
	 }

	/**
	 * Get the name of the "updated at" column.
	 *
	 * @static
	 * @return string
	 */
	 public static function getUpdatedAtColumn(){
		return parent::getUpdatedAtColumn();
	 }

	/**
	 * Get a fresh timestamp for the model.
	 *
	 * @static
	 * @return mixed
	 */
	 public static function freshTimestamp(){
		return parent::freshTimestamp();
	 }

	/**
	 * Get a new query builder for the model's table.
	 *
	 * @static
	 * @return Illuminate\Database\Eloquent\Builder
	 */
	 public static function newQuery(){
		return parent::newQuery();
	 }

	/**
	 * Create a new Eloquent Collection instance.
	 *
	 * @static
	 * @param	array	$models
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	 public static function newCollection($models = array()){
		return parent::newCollection($models);
	 }

	/**
	 * Get the table associated with the model.
	 *
	 * @static
	 * @return string
	 */
	 public static function getTable(){
		return parent::getTable();
	 }

	/**
	 * Set the table associated with the model.
	 *
	 * @static
	 * @param	string	$table
	 */
	 public static function setTable($table){
		parent::setTable($table);
	 }

	/**
	 * Get the value of the model's primary key.
	 *
	 * @static
	 * @return mixed
	 */
	 public static function getKey(){
		return parent::getKey();
	 }

	/**
	 * Get the primary key for the model.
	 *
	 * @static
	 * @return string
	 */
	 public static function getKeyName(){
		return parent::getKeyName();
	 }

	/**
	 * Determine if the model uses timestamps.
	 *
	 * @static
	 * @return bool
	 */
	 public static function usesTimestamps(){
		return parent::usesTimestamps();
	 }

	/**
	 * Get the number of models to return per page.
	 *
	 * @static
	 * @return int
	 */
	 public static function getPerPage(){
		return parent::getPerPage();
	 }

	/**
	 * Set the number of models ot return per page.
	 *
	 * @static
	 * @param	int	$perPage
	 */
	 public static function setPerPage($perPage){
		parent::setPerPage($perPage);
	 }

	/**
	 * Get the default foreign key name for the model.
	 *
	 * @static
	 * @return string
	 */
	 public static function getForeignKey(){
		return parent::getForeignKey();
	 }

	/**
	 * Get the hidden attributes for the model.
	 *
	 * @static
	 * @return array
	 */
	 public static function getHidden(){
		return parent::getHidden();
	 }

	/**
	 * Set the hidden attributes for the model.
	 *
	 * @static
	 * @param	array	$hidden
	 */
	 public static function setHidden($hidden){
		parent::setHidden($hidden);
	 }

	/**
	 * Get the fillable attributes for the model.
	 *
	 * @static
	 * @return array
	 */
	 public static function getFillable(){
		return parent::getFillable();
	 }

	/**
	 * Set the fillable attributes for the model.
	 *
	 * @static
	 * @param	array	$fillable
	 * @return Illuminate\Database\Eloquent\Model
	 */
	 public static function fillable($fillable){
		return parent::fillable($fillable);
	 }

	/**
	 * Set the guarded attributes for the model.
	 *
	 * @static
	 * @param	array	$guarded
	 * @return Illuminate\Database\Eloquent\Model
	 */
	 public static function guard($guarded){
		return parent::guard($guarded);
	 }

	/**
	 * Determine if the given attribute may be mass assigned.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function isFillable($key){
		return parent::isFillable($key);
	 }

	/**
	 * Get the value indicating whether the IDs are incrementing.
	 *
	 * @static
	 * @return bool
	 */
	 public static function getIncrementing(){
		return parent::getIncrementing();
	 }

	/**
	 * Set whether IDs are incrementing.
	 *
	 * @static
	 * @param	bool	$value
	 */
	 public static function setIncrementing($value){
		parent::setIncrementing($value);
	 }

	/**
	 * Convert the model instance to JSON.
	 *
	 * @static
	 * @param	int	$options
	 * @return string
	 */
	 public static function toJson($options = 0){
		return parent::toJson($options);
	 }

	/**
	 * Convert the model instance to an array.
	 *
	 * @static
	 * @return array
	 */
	 public static function toArray(){
		return parent::toArray();
	 }

	/**
	 * Convert the model's attributes to an array.
	 *
	 * @static
	 * @return array
	 */
	 public static function attributesToArray(){
		return parent::attributesToArray();
	 }

	/**
	 * Get the model's relationships in array form.
	 *
	 * @static
	 * @return array
	 */
	 public static function relationsToArray(){
		return parent::relationsToArray();
	 }

	/**
	 * Get an attribute from the model.
	 *
	 * @static
	 * @param	string	$key
	 * @return mixed
	 */
	 public static function getAttribute($key){
		return parent::getAttribute($key);
	 }

	/**
	 * Determine if a get mutator exists for an attribute.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function hasGetMutator($key){
		return parent::hasGetMutator($key);
	 }

	/**
	 * Set a given attribute on the model.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 */
	 public static function setAttribute($key, $value){
		parent::setAttribute($key, $value);
	 }

	/**
	 * Determine if a set mutator exists for an attribute.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function hasSetMutator($key){
		return parent::hasSetMutator($key);
	 }

	/**
	 * Get all of the current attributes on the model.
	 *
	 * @static
	 * @return array
	 */
	 public static function getAttributes(){
		return parent::getAttributes();
	 }

	/**
	 * Set the array of model attributes. No checking is done.
	 *
	 * @static
	 * @param	array	$attributes
	 * @param	bool	$sync
	 */
	 public static function setRawAttributes($attributes, $sync = false){
		parent::setRawAttributes($attributes, $sync);
	 }

	/**
	 * Get the model's original attribute values.
	 *
	 * @static
	 * @param	string|null	$key
	 * @param	mixed	$default
	 * @return array
	 */
	 public static function getOriginal($key = null, $default = null){
		return parent::getOriginal($key, $default);
	 }

	/**
	 * Sync the original attributes with the current.
	 *
	 * @static
	 * @return Illuminate\Database\Eloquent\Model
	 */
	 public static function syncOriginal(){
		return parent::syncOriginal();
	 }

	/**
	 * Get the attributes that have been changed since last sync.
	 *
	 * @static
	 * @return array
	 */
	 public static function getDirty(){
		return parent::getDirty();
	 }

	/**
	 * Get a specified relationship.
	 *
	 * @static
	 * @param	string	$relation
	 * @return mixed
	 */
	 public static function getRelation($relation){
		return parent::getRelation($relation);
	 }

	/**
	 * Set the specific relationship in the model.
	 *
	 * @static
	 * @param	string	$relation
	 * @param	mixed	$value
	 */
	 public static function setRelation($relation, $value){
		parent::setRelation($relation, $value);
	 }

	/**
	 * Get the database connection for the model.
	 *
	 * @static
	 * @return Illuminate\Database\Connection
	 */
	 public static function getConnection(){
		return parent::getConnection();
	 }

	/**
	 * Get the current connection name for the model.
	 *
	 * @static
	 * @return string
	 */
	 public static function getConnectionName(){
		return parent::getConnectionName();
	 }

	/**
	 * Set the connection associated with the model.
	 *
	 * @static
	 * @param	string	$name
	 */
	 public static function setConnection($name){
		parent::setConnection($name);
	 }

	/**
	 * Resolve a connection instance by name.
	 *
	 * @static
	 * @param	string	$connection
	 * @return Illuminate\Database\Connection
	 */
	 public static function resolveConnection($connection){
		return parent::resolveConnection($connection);
	 }

	/**
	 * Get the connection resolver instance.
	 *
	 * @static
	 * @return Illuminate\Database\ConnectionResolverInterface
	 */
	 public static function getConnectionResolver(){
		return parent::getConnectionResolver();
	 }

	/**
	 * Set the connection resolver instance.
	 *
	 * @static
	 * @param	Illuminate\Database\ConnectionResolverInterface	$resolver
	 */
	 public static function setConnectionResolver($resolver){
		parent::setConnectionResolver($resolver);
	 }

	/**
	 * Get the event dispatcher instance.
	 *
	 * @static
	 * @return Illuminate\Events\Dispatcher
	 */
	 public static function getEventDispatcher(){
		return parent::getEventDispatcher();
	 }

	/**
	 * Set the event dispatcher instance.
	 *
	 * @static
	 * @param	Illuminate\Events\Dispatcher
	 */
	 public static function setEventDispatcher($dispatcher){
		parent::setEventDispatcher($dispatcher);
	 }

	/**
	 * Unset the event dispatcher for models.
	 *
	 * @static
	 */
	 public static function unsetEventDispatcher(){
		parent::unsetEventDispatcher();
	 }

	/**
	 * Get the mutated attributes for a given instance.
	 *
	 * @static
	 * @return array
	 */
	 public static function getMutatedAttributes(){
		return parent::getMutatedAttributes();
	 }

	/**
	 * Dynamically retrieve attributes on the model.
	 *
	 * @static
	 * @param	string	$key
	 * @return mixed
	 */
	 public static function __get($key){
		return parent::__get($key);
	 }

	/**
	 * Dynamically set attributes on the model.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 */
	 public static function __set($key, $value){
		parent::__set($key, $value);
	 }

	/**
	 * Determine if the given attribute exists.
	 *
	 * @static
	 * @param	mixed	$offset
	 * @return bool
	 */
	 public static function offsetExists($offset){
		return parent::offsetExists($offset);
	 }

	/**
	 * Get the value for a given offset.
	 *
	 * @static
	 * @param	mixed	$offset
	 * @return mixed
	 */
	 public static function offsetGet($offset){
		return parent::offsetGet($offset);
	 }

	/**
	 * Set the value for a given offset.
	 *
	 * @static
	 * @param	mixed	$offset
	 * @param	mixed	$value
	 */
	 public static function offsetSet($offset, $value){
		parent::offsetSet($offset, $value);
	 }

	/**
	 * Unset the value for a given offset.
	 *
	 * @static
	 * @param	mixed	$offset
	 */
	 public static function offsetUnset($offset){
		parent::offsetUnset($offset);
	 }

	/**
	 * Determine if an attribute exists on the model.
	 *
	 * @static
	 * @param	string	$key
	 */
	 public static function __isset($key){
		parent::__isset($key);
	 }

	/**
	 * Unset an attribute on the model.
	 *
	 * @static
	 * @param	string	$key
	 */
	 public static function __unset($key){
		parent::__unset($key);
	 }

	/**
	 * Handle dynamic method calls into the method.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function __call($method, $parameters){
		return parent::__call($method, $parameters);
	 }

	/**
	 * Handle dynamic static method calls into the method.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function __callStatic($method, $parameters){
		return parent::__callStatic($method, $parameters);
	 }

	/**
	 * Convert the model to its string representation.
	 *
	 * @static
	 * @return string
	 */
	 public static function __toString(){
		return parent::__toString();
	 }

 }
}

namespace  {
 class Event extends Illuminate\Events\Dispatcher{
	/**
	 * Create a new event dispatcher instance.
	 *
	 * @static
	 * @param	Illuminate\Container\Container	$container
	 */
	 public static function __construct($container = null){
		parent::__construct($container);
	 }

	/**
	 * Register an event listener with the dispatcher.
	 *
	 * @static
	 * @param	string	$event
	 * @param	mixed	$listener
	 * @param	int	$priority
	 */
	 public static function listen($event, $listener, $priority = 0){
		parent::listen($event, $listener, $priority);
	 }

	/**
	 * Determine if a given event has listeners.
	 *
	 * @static
	 * @param	string	$eventName
	 * @return bool
	 */
	 public static function hasListeners($eventName){
		return parent::hasListeners($eventName);
	 }

	/**
	 * Register a queued event and payload.
	 *
	 * @static
	 * @param	string	$event
	 * @param	array	$payload
	 */
	 public static function queue($event, $payload = array()){
		parent::queue($event, $payload);
	 }

	/**
	 * Register an event subscriber with the dispatcher.
	 *
	 * @static
	 * @param	string	$subscriber
	 */
	 public static function subscribe($subscriber){
		parent::subscribe($subscriber);
	 }

	/**
	 * Fire an event until the first non-null response is returned.
	 *
	 * @static
	 * @param	string	$event
	 * @param	array	$payload
	 * @return mixed
	 */
	 public static function until($event, $payload = array()){
		return parent::until($event, $payload);
	 }

	/**
	 * Flush a set of queued events.
	 *
	 * @static
	 * @param	string	$event
	 */
	 public static function flush($event){
		parent::flush($event);
	 }

	/**
	 * Fire an event and call the listeners.
	 *
	 * @static
	 * @param	string	$event
	 * @param	mixed	$payload
	 * @param	boolean $halt
	 */
	 public static function fire($event, $payload = array(), $halt = false){
		parent::fire($event, $payload, $halt);
	 }

	/**
	 * Get all of the listeners for a given event name.
	 *
	 * @static
	 * @param	string	$eventName
	 * @return array
	 */
	 public static function getListeners($eventName){
		return parent::getListeners($eventName);
	 }

	/**
	 * Register an event listener with the dispatcher.
	 *
	 * @static
	 * @param	mixed	$listener
	 */
	 public static function makeListener($listener){
		parent::makeListener($listener);
	 }

	/**
	 * Create a class based listener using the IoC container.
	 *
	 * @static
	 * @param	mixed	$listener
	 * @return Closure
	 */
	 public static function createClassListener($listener){
		return parent::createClassListener($listener);
	 }

 }
}

namespace  {
 class File extends Illuminate\Filesystem\Filesystem{
	/**
	 * Determine if a file exists.
	 *
	 * @static
	 * @param	string	$path
	 * @return bool
	 */
	 public static function exists($path){
		return parent::exists($path);
	 }

	/**
	 * Get the contents of a file.
	 *
	 * @static
	 * @param	string	$path
	 * @return string
	 */
	 public static function get($path){
		return parent::get($path);
	 }

	/**
	 * Get the contents of a remote file.
	 *
	 * @static
	 * @param	string	$path
	 * @return string
	 */
	 public static function getRemote($path){
		return parent::getRemote($path);
	 }

	/**
	 * Get the returned value of a file.
	 *
	 * @static
	 * @param	string	$path
	 * @return mixed
	 */
	 public static function getRequire($path){
		return parent::getRequire($path);
	 }

	/**
	 * Require the given file once.
	 *
	 * @static
	 * @param	string	$file
	 */
	 public static function requireOnce($file){
		parent::requireOnce($file);
	 }

	/**
	 * Write the contents of a file.
	 *
	 * @static
	 * @param	string	$path
	 * @param	string	$contents
	 * @return int
	 */
	 public static function put($path, $contents){
		return parent::put($path, $contents);
	 }

	/**
	 * Append to a file.
	 *
	 * @static
	 * @param	string	$path
	 * @param	string	$data
	 * @return int
	 */
	 public static function append($path, $data){
		return parent::append($path, $data);
	 }

	/**
	 * Delete the file at a given path.
	 *
	 * @static
	 * @param	string	$path
	 * @return bool
	 */
	 public static function delete($path){
		return parent::delete($path);
	 }

	/**
	 * Move a file to a new location.
	 *
	 * @static
	 * @param	string	$path
	 * @param	string	$target
	 */
	 public static function move($path, $target){
		parent::move($path, $target);
	 }

	/**
	 * Copy a file to a new location.
	 *
	 * @static
	 * @param	string	$path
	 * @param	string	$target
	 */
	 public static function copy($path, $target){
		parent::copy($path, $target);
	 }

	/**
	 * Extract the file extension from a file path.
	 *
	 * @static
	 * @param	string	$path
	 * @return string
	 */
	 public static function extension($path){
		return parent::extension($path);
	 }

	/**
	 * Get the file type of a given file.
	 *
	 * @static
	 * @param	string	$path
	 * @return string
	 */
	 public static function type($path){
		return parent::type($path);
	 }

	/**
	 * Get the file size of a given file.
	 *
	 * @static
	 * @param	string	$path
	 * @return int
	 */
	 public static function size($path){
		return parent::size($path);
	 }

	/**
	 * Get the file's last modification time.
	 *
	 * @static
	 * @param	string	$path
	 * @return int
	 */
	 public static function lastModified($path){
		return parent::lastModified($path);
	 }

	/**
	 * Determine if the given path is a directory.
	 *
	 * @static
	 * @param	string	$directory
	 * @return bool
	 */
	 public static function isDirectory($directory){
		return parent::isDirectory($directory);
	 }

	/**
	 * Find path names matching a given pattern.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	int	$flags
	 * @return array
	 */
	 public static function glob($pattern, $flags = 0){
		return parent::glob($pattern, $flags);
	 }

	/**
	 * Get an array of all files in a directory.
	 *
	 * @static
	 * @param	string	$directory
	 * @return array
	 */
	 public static function files($directory){
		return parent::files($directory);
	 }

	/**
	 * Create a directory.
	 *
	 * @static
	 * @param	string	$path
	 * @param	int	$mode
	 * @param	bool	$recursive
	 * @return bool
	 */
	 public static function makeDirectory($path, $mode = 511, $recursive = false){
		return parent::makeDirectory($path, $mode, $recursive);
	 }

	/**
	 * Copy a directory from one location to another.
	 *
	 * @static
	 * @param	string	$directory
	 * @param	string	$destination
	 * @param	int	$options
	 */
	 public static function copyDirectory($directory, $destination, $options = null){
		parent::copyDirectory($directory, $destination, $options);
	 }

	/**
	 * Recursively delete a directory.
	 * 
	 * The directory itself may be optionally preserved.
	 *
	 * @static
	 * @param	string	$directory
	 * @param	bool	$preserve
	 */
	 public static function deleteDirectory($directory, $preserve = false){
		parent::deleteDirectory($directory, $preserve);
	 }

	/**
	 * Empty the specified directory of all files and folders.
	 *
	 * @static
	 * @param	string	$directory
	 */
	 public static function cleanDirectory($directory){
		parent::cleanDirectory($directory);
	 }

 }
}

namespace  {
 class Form extends LaravelBook\Laravel4Powerpack\Form{
	/**
	 * 
	 *
	 * @static
	 */
	 public static function __construct($html){
		parent::__construct($html);
	 }

	/**
	 * Registers a custom macro.
	 *
	 * @static
	 * @param	string	$name
	 * @param	Closure $macro
	 */
	 public static function macro($name, $macro){
		parent::macro($name, $macro);
	 }

	/**
	 * Open a HTML form.
	 * 
	 * <code>
	 * // Open a "POST" form to the current request URI
	 * echo Form::open();
	 * 
	 * // Open a "POST" form to a given URI
	 * echo Form::open('user/profile');
	 * 
	 * // Open a "PUT" form to a given URI
	 * echo Form::open('user/profile', 'put');
	 * 
	 * // Open a form that has HTML attributes
	 * echo Form::open('user/profile', 'post', array('class' => 'profile'));
	 * </code>
	 *
	 * @static
	 * @param	string	$action
	 * @param	string	$method
	 * @param	array	$attributes
	 * @param	bool	$https
	 * @return string
	 */
	 public static function open($action = null, $method = 'POST', $attributes = array(), $https = null){
		return parent::open($action, $method, $attributes, $https);
	 }

	/**
	 * Open a HTML form with a HTTPS action URI.
	 *
	 * @static
	 * @param	string	$action
	 * @param	string	$method
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function openSecure($action = null, $method = 'POST', $attributes = array()){
		return parent::openSecure($action, $method, $attributes);
	 }

	/**
	 * Open a HTML form that accepts file uploads.
	 *
	 * @static
	 * @param	string	$action
	 * @param	string	$method
	 * @param	array	$attributes
	 * @param	bool	$https
	 * @return string
	 */
	 public static function openForFiles($action = null, $method = 'POST', $attributes = array(), $https = null){
		return parent::openForFiles($action, $method, $attributes, $https);
	 }

	/**
	 * Open a HTML form that accepts file uploads with a HTTPS action URI.
	 *
	 * @static
	 * @param	string	$action
	 * @param	string	$method
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function openSecureForFiles($action = null, $method = 'POST', $attributes = array()){
		return parent::openSecureForFiles($action, $method, $attributes);
	 }

	/**
	 * Close a HTML form.
	 *
	 * @static
	 * @return string
	 */
	 public static function close(){
		return parent::close();
	 }

	/**
	 * Generate a hidden field containing the current CSRF token.
	 *
	 * @static
	 * @return string
	 */
	 public static function token(){
		return parent::token();
	 }

	/**
	 * Create a HTML label element.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function label($name, $value, $attributes = array()){
		return parent::label($name, $value, $attributes);
	 }

	/**
	 * Create a HTML input element.
	 *
	 * @static
	 * @param	string	$type
	 * @param	string	$name
	 * @param	mixed	$value
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function input($type, $name, $value = null, $attributes = array()){
		return parent::input($type, $name, $value, $attributes);
	 }

	/**
	 * Create a HTML text input element.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function text($name, $value = null, $attributes = array()){
		return parent::text($name, $value, $attributes);
	 }

	/**
	 * Create a HTML password input element.
	 *
	 * @static
	 * @param	string	$name
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function password($name, $attributes = array()){
		return parent::password($name, $attributes);
	 }

	/**
	 * Create a HTML hidden input element.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function hidden($name, $value = null, $attributes = array()){
		return parent::hidden($name, $value, $attributes);
	 }

	/**
	 * Create a HTML search input element.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function search($name, $value = null, $attributes = array()){
		return parent::search($name, $value, $attributes);
	 }

	/**
	 * Create a HTML email input element.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function email($name, $value = null, $attributes = array()){
		return parent::email($name, $value, $attributes);
	 }

	/**
	 * Create a HTML telephone input element.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function telephone($name, $value = null, $attributes = array()){
		return parent::telephone($name, $value, $attributes);
	 }

	/**
	 * Create a HTML URL input element.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function url($name, $value = null, $attributes = array()){
		return parent::url($name, $value, $attributes);
	 }

	/**
	 * Create a HTML number input element.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function number($name, $value = null, $attributes = array()){
		return parent::number($name, $value, $attributes);
	 }

	/**
	 * Create a HTML date input element.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function date($name, $value = null, $attributes = array()){
		return parent::date($name, $value, $attributes);
	 }

	/**
	 * Create a HTML file input element.
	 *
	 * @static
	 * @param	string	$name
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function file($name, $attributes = array()){
		return parent::file($name, $attributes);
	 }

	/**
	 * Create a HTML textarea element.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function textarea($name, $value = '', $attributes = array()){
		return parent::textarea($name, $value, $attributes);
	 }

	/**
	 * Create a HTML select element.
	 *
	 * @static
	 * @param	string	$name
	 * @param	array	$options
	 * @param	string	$selected
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function select($name, $options = array(), $selected = null, $attributes = array()){
		return parent::select($name, $options, $selected, $attributes);
	 }

	/**
	 * Create a HTML checkbox input element.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	bool	$checked
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function checkbox($name, $value = 1, $checked = false, $attributes = array()){
		return parent::checkbox($name, $value, $checked, $attributes);
	 }

	/**
	 * Create a HTML radio button input element.
	 *
	 * @static
	 * @param	string	$name
	 * @param	string	$value
	 * @param	bool	$checked
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function radio($name, $value = null, $checked = false, $attributes = array()){
		return parent::radio($name, $value, $checked, $attributes);
	 }

	/**
	 * Create a HTML submit input element.
	 *
	 * @static
	 * @param	string	$value
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function submit($value = null, $attributes = array()){
		return parent::submit($value, $attributes);
	 }

	/**
	 * Create a HTML reset input element.
	 *
	 * @static
	 * @param	string	$value
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function reset($value = null, $attributes = array()){
		return parent::reset($value, $attributes);
	 }

	/**
	 * Create a HTML image input element.
	 *
	 * @static
	 * @param	string	$url
	 * @param	string	$name
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function image($url, $name = null, $attributes = array()){
		return parent::image($url, $name, $attributes);
	 }

	/**
	 * Create a HTML button element.
	 *
	 * @static
	 * @param	string	$value
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function button($value = null, $attributes = array()){
		return parent::button($value, $attributes);
	 }

	/**
	 * Dynamically handle calls to custom macros.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function __call($method, $parameters){
		return parent::__call($method, $parameters);
	 }

 }
}

namespace  {
 class Hash extends Illuminate\Hashing\BcryptHasher{
	/**
	 * Hash the given value.
	 *
	 * @static
	 * @param	string	$value
	 * @param	array	$options
	 * @return string
	 */
	 public static function make($value, $options = array()){
		return parent::make($value, $options);
	 }

	/**
	 * Check the given plain value against a hash.
	 *
	 * @static
	 * @param	string	$value
	 * @param	string	$hashedValue
	 * @param	array	$options
	 * @return bool
	 */
	 public static function check($value, $hashedValue, $options = array()){
		return parent::check($value, $hashedValue, $options);
	 }

 }
}

namespace  {
 class Html extends Illuminate\Html\HtmlBuilder{
	/**
	 * Convert an HTML string to entities.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function entities($value){
		return parent::entities($value);
	 }

	/**
	 * Convert entities to HTML characters.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function decode($value){
		return parent::decode($value);
	 }

	/**
	 * Generate an ordered list of items.
	 *
	 * @static
	 * @param	array	$list
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function ol($list, $attributes = array()){
		return parent::ol($list, $attributes);
	 }

	/**
	 * Generate an un-ordered list of items.
	 *
	 * @static
	 * @param	array	$list
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function ul($list, $attributes = array()){
		return parent::ul($list, $attributes);
	 }

	/**
	 * Build an HTML attribute string from an array.
	 *
	 * @static
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function attributes($attributes){
		return parent::attributes($attributes);
	 }

 }
}

namespace  {
 class Input extends Illuminate\Http\Request{
	/**
	 * Return the Request instance.
	 *
	 * @static
	 * @return Illuminate\Http\Request
	 */
	 public static function instance(){
		return parent::instance();
	 }

	/**
	 * Get the root URL for the application.
	 *
	 * @static
	 * @return string
	 */
	 public static function root(){
		return parent::root();
	 }

	/**
	 * Get the URL (no query string) for the request.
	 *
	 * @static
	 * @return string
	 */
	 public static function url(){
		return parent::url();
	 }

	/**
	 * Get the full URL for the request.
	 *
	 * @static
	 * @return string
	 */
	 public static function fullUrl(){
		return parent::fullUrl();
	 }

	/**
	 * Get the current path info for the request.
	 *
	 * @static
	 * @return string
	 */
	 public static function path(){
		return parent::path();
	 }

	/**
	 * Get a segment from the URI (1 based index).
	 *
	 * @static
	 * @param	string	$index
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function segment($index, $default = null){
		return parent::segment($index, $default);
	 }

	/**
	 * Get all of the segments for the request path.
	 *
	 * @static
	 * @return array
	 */
	 public static function segments(){
		return parent::segments();
	 }

	/**
	 * Determine if the current request URI matches a pattern.
	 *
	 * @static
	 * @param	string	$pattern
	 * @return bool
	 */
	 public static function is($pattern){
		return parent::is($pattern);
	 }

	/**
	 * Determine if the request is the result of an AJAX call.
	 *
	 * @static
	 * @return bool
	 */
	 public static function ajax(){
		return parent::ajax();
	 }

	/**
	 * Determine if the request is over HTTPS.
	 *
	 * @static
	 * @return bool
	 */
	 public static function secure(){
		return parent::secure();
	 }

	/**
	 * Determine if the request contains a given input item.
	 *
	 * @static
	 * @param	string|array	$key
	 * @return bool
	 */
	 public static function has($key){
		return parent::has($key);
	 }

	/**
	 * Get all of the input and files for the request.
	 *
	 * @static
	 * @return array
	 */
	 public static function all(){
		return parent::all();
	 }

	/**
	 * Retrieve an input item from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function input($key = null, $default = null){
		return parent::input($key, $default);
	 }

	/**
	 * Get a subset of the items from the input data.
	 *
	 * @static
	 * @param	array	$keys
	 * @return array
	 */
	 public static function only($keys){
		return parent::only($keys);
	 }

	/**
	 * Get all of the input except for a specified array of items.
	 *
	 * @static
	 * @param	array	$keys
	 * @return array
	 */
	 public static function except($keys){
		return parent::except($keys);
	 }

	/**
	 * Retrieve a query string item from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function query($key = null, $default = null){
		return parent::query($key, $default);
	 }

	/**
	 * Retrieve a cookie from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function cookie($key = null, $default = null){
		return parent::cookie($key, $default);
	 }

	/**
	 * Retrieve a file from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return Symfony\Component\HttpFoundation\File\UploadedFile
	 */
	 public static function file($key = null, $default = null){
		return parent::file($key, $default);
	 }

	/**
	 * Determine if the uploaded data contains a file.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function hasFile($key){
		return parent::hasFile($key);
	 }

	/**
	 * Retrieve a header from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function header($key = null, $default = null){
		return parent::header($key, $default);
	 }

	/**
	 * Retrieve a server variable from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function server($key = null, $default = null){
		return parent::server($key, $default);
	 }

	/**
	 * Retrieve an old input item.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function old($key = null, $default = null){
		return parent::old($key, $default);
	 }

	/**
	 * Flash the input for the current request to the session.
	 *
	 * @static
	 * @param	string $filter
	 * @param	array	$keys
	 */
	 public static function flash($filter = null, $keys = array()){
		parent::flash($filter, $keys);
	 }

	/**
	 * Flash only some of the input to the session.
	 *
	 * @static
	 * @param	dynamic	string
	 */
	 public static function flashOnly($keys){
		parent::flashOnly($keys);
	 }

	/**
	 * Flash only some of the input to the session.
	 *
	 * @static
	 * @param	dynamic	string
	 */
	 public static function flashExcept($keys){
		parent::flashExcept($keys);
	 }

	/**
	 * Flush all of the old input from the session.
	 *
	 * @static
	 */
	 public static function flush(){
		parent::flush();
	 }

	/**
	 * Merge new input into the current request's input array.
	 *
	 * @static
	 * @param	array	$input
	 */
	 public static function merge($input){
		parent::merge($input);
	 }

	/**
	 * Replace the input for the current request.
	 *
	 * @static
	 * @param	array	$input
	 */
	 public static function replace($input){
		parent::replace($input);
	 }

	/**
	 * Get the JSON payload for the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return mixed
	 */
	 public static function json($key = null, $default = null){
		return parent::json($key, $default);
	 }

	/**
	 * Get the Illuminate session store implementation.
	 *
	 * @static
	 * @return Illuminate\Session\Store
	 */
	 public static function getSessionStore(){
		return parent::getSessionStore();
	 }

	/**
	 * Set the Illuminate session store implementation.
	 *
	 * @static
	 * @param	Illuminate\Session\Store	$session
	 */
	 public static function setSessionStore($session){
		parent::setSessionStore($session);
	 }

	/**
	 * Determine if the session store has been set.
	 *
	 * @static
	 * @return bool
	 */
	 public static function hasSessionStore(){
		return parent::hasSessionStore();
	 }

	/**
	 * Constructor.
	 *
	 * @static
	 * @param	array	$query	The GET parameters
	 * @param	array	$request	The POST parameters
	 * @param	array	$attributes The request attributes (parameters parsed from the PATH_INFO, ...)
	 * @param	array	$cookies	The COOKIE parameters
	 * @param	array	$files	The FILES parameters
	 * @param	array	$server	The SERVER parameters
	 * @param	string $content	The raw body data

	 */
	 public static function __construct($query = array(), $request = array(), $attributes = array(), $cookies = array(), $files = array(), $server = array(), $content = null){
		parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
	 }

	/**
	 * Sets the parameters for this request.
	 * 
	 * This method also re-initializes all properties.
	 *
	 * @static
	 * @param	array	$query	The GET parameters
	 * @param	array	$request	The POST parameters
	 * @param	array	$attributes The request attributes (parameters parsed from the PATH_INFO, ...)
	 * @param	array	$cookies	The COOKIE parameters
	 * @param	array	$files	The FILES parameters
	 * @param	array	$server	The SERVER parameters
	 * @param	string $content	The raw body data

	 */
	 public static function initialize($query = array(), $request = array(), $attributes = array(), $cookies = array(), $files = array(), $server = array(), $content = null){
		parent::initialize($query, $request, $attributes, $cookies, $files, $server, $content);
	 }

	/**
	 * Creates a new request with values from PHP's super globals.
	 *
	 * @static
	 * @return Request A new request

	 */
	 public static function createFromGlobals(){
		return parent::createFromGlobals();
	 }

	/**
	 * Creates a Request based on a given URI and configuration.
	 * 
	 * The information contained in the URI always take precedence
	 * over the other information (server and parameters).
	 *
	 * @static
	 * @param	string $uri	The URI
	 * @param	string $method	The HTTP method
	 * @param	array	$parameters The query (GET) or request (POST) parameters
	 * @param	array	$cookies	The request cookies ($_COOKIE)
	 * @param	array	$files	The request files ($_FILES)
	 * @param	array	$server	The server parameters ($_SERVER)
	 * @param	string $content	The raw body data

	 * @return Request A Request instance

	 */
	 public static function create($uri, $method = 'GET', $parameters = array(), $cookies = array(), $files = array(), $server = array(), $content = null){
		return parent::create($uri, $method, $parameters, $cookies, $files, $server, $content);
	 }

	/**
	 * Clones a request and overrides some of its parameters.
	 *
	 * @static
	 * @param	array $query	The GET parameters
	 * @param	array $request	The POST parameters
	 * @param	array $attributes The request attributes (parameters parsed from the PATH_INFO, ...)
	 * @param	array $cookies	The COOKIE parameters
	 * @param	array $files	The FILES parameters
	 * @param	array $server	The SERVER parameters

	 * @return Request The duplicated request

	 */
	 public static function duplicate($query = null, $request = null, $attributes = null, $cookies = null, $files = null, $server = null){
		return parent::duplicate($query, $request, $attributes, $cookies, $files, $server);
	 }

	/**
	 * Returns the request as a string.
	 *
	 * @static
	 * @return string The request
	 */
	 public static function __toString(){
		return parent::__toString();
	 }

	/**
	 * Overrides the PHP global variables according to this request instance.
	 * 
	 * It overrides $_GET, $_POST, $_REQUEST, $_SERVER, $_COOKIE.
	 * $_FILES is never override, see rfc1867
	 *
	 * @static
	 */
	 public static function overrideGlobals(){
		parent::overrideGlobals();
	 }

	/**
	 * Trusts $_SERVER entries coming from proxies.
	 *
	 * @static
	 */
	 public static function trustProxyData(){
		parent::trustProxyData();
	 }

	/**
	 * Sets a list of trusted proxies.
	 * 
	 * You should only list the reverse proxies that you manage directly.
	 *
	 * @static
	 * @param	array $proxies A list of trusted proxies

	 */
	 public static function setTrustedProxies($proxies){
		parent::setTrustedProxies($proxies);
	 }

	/**
	 * Gets the list of trusted proxies.
	 *
	 * @static
	 * @return array An array of trusted proxies.
	 */
	 public static function getTrustedProxies(){
		return parent::getTrustedProxies();
	 }

	/**
	 * Sets the name for trusted headers.
	 * 
	 * The following header keys are supported:
	 * 
	 * * Request::HEADER_CLIENT_IP:    defaults to X-Forwarded-For   (see getClientIp())
	 * * Request::HEADER_CLIENT_HOST:  defaults to X-Forwarded-Host  (see getClientHost())
	 * * Request::HEADER_CLIENT_PORT:  defaults to X-Forwarded-Port  (see getClientPort())
	 * * Request::HEADER_CLIENT_PROTO: defaults to X-Forwarded-Proto (see getScheme() and isSecure())
	 * 
	 * Setting an empty value allows to disable the trusted header for the given key.
	 *
	 * @static
	 * @param	string $key	The header key
	 * @param	string $value The header name

	 */
	 public static function setTrustedHeaderName($key, $value){
		parent::setTrustedHeaderName($key, $value);
	 }

	/**
	 * Returns true if $_SERVER entries coming from proxies are trusted,
	 * false otherwise.
	 *
	 * @static
	 * @return boolean

	 */
	 public static function isProxyTrusted(){
		return parent::isProxyTrusted();
	 }

	/**
	 * Normalizes a query string.
	 * 
	 * It builds a normalized query string, where keys/value pairs are alphabetized,
	 * have consistent escaping and unneeded delimiters are removed.
	 *
	 * @static
	 * @param	string $qs Query string

	 * @return string A normalized query string for the Request
	 */
	 public static function normalizeQueryString($qs){
		return parent::normalizeQueryString($qs);
	 }

	/**
	 * Enables support for the _method request parameter to determine the intended HTTP method.
	 * 
	 * Be warned that enabling this feature might lead to CSRF issues in your code.
	 * Check that you are using CSRF tokens when required.
	 * 
	 * The HTTP method can only be overridden when the real HTTP method is POST.
	 *
	 * @static
	 */
	 public static function enableHttpMethodParameterOverride(){
		parent::enableHttpMethodParameterOverride();
	 }

	/**
	 * Checks whether support for the _method request parameter is enabled.
	 *
	 * @static
	 * @return Boolean True when the _method request parameter is enabled, false otherwise
	 */
	 public static function getHttpMethodParameterOverride(){
		return parent::getHttpMethodParameterOverride();
	 }

	/**
	 * Gets a "parameter" value.
	 * 
	 * This method is mainly useful for libraries that want to provide some flexibility.
	 * 
	 * Order of precedence: GET, PATH, POST
	 * 
	 * Avoid using this method in controllers:
	 * 
	 * * slow
	 * * prefer to get from a "named" source
	 * 
	 * It is better to explicitly get request parameters from the appropriate
	 * public property instead (query, attributes, request).
	 *
	 * @static
	 * @param	string	$key	the key
	 * @param	mixed	$default the default value
	 * @param	Boolean $deep	is parameter deep in multidimensional array

	 * @return mixed
	 */
	 public static function get($key, $default = null, $deep = false){
		return parent::get($key, $default, $deep);
	 }

	/**
	 * Gets the Session.
	 *
	 * @static
	 * @return SessionInterface|null The session

	 */
	 public static function getSession(){
		return parent::getSession();
	 }

	/**
	 * Whether the request contains a Session which was started in one of the
	 * previous requests.
	 *
	 * @static
	 * @return Boolean

	 */
	 public static function hasPreviousSession(){
		return parent::hasPreviousSession();
	 }

	/**
	 * Whether the request contains a Session object.
	 * 
	 * This method does not give any information about the state of the session object,
	 * like whether the session is started or not. It is just a way to check if this Request
	 * is associated with a Session instance.
	 *
	 * @static
	 * @return Boolean true when the Request contains a Session object, false otherwise

	 */
	 public static function hasSession(){
		return parent::hasSession();
	 }

	/**
	 * Sets the Session.
	 *
	 * @static
	 * @param	SessionInterface $session The Session

	 */
	 public static function setSession($session){
		parent::setSession($session);
	 }

	/**
	 * Returns the client IP address.
	 * 
	 * This method can read the client IP address from the "X-Forwarded-For" header
	 * when trusted proxies were set via "setTrustedProxies()". The "X-Forwarded-For"
	 * header value is a comma+space separated list of IP addresses, the left-most
	 * being the original client, and each successive proxy that passed the request
	 * adding the IP address where it received the request from.
	 * 
	 * If your reverse proxy uses a different header name than "X-Forwarded-For",
	 * ("Client-Ip" for instance), configure it via "setTrustedHeaderName()" with
	 * the "client-ip" key.
	 *
	 * @static
	 * @return string The client IP address

	 */
	 public static function getClientIp(){
		return parent::getClientIp();
	 }

	/**
	 * Returns current script name.
	 *
	 * @static
	 * @return string

	 */
	 public static function getScriptName(){
		return parent::getScriptName();
	 }

	/**
	 * Returns the path being requested relative to the executed script.
	 * 
	 * The path info always starts with a /.
	 * 
	 * Suppose this request is instantiated from /mysite on localhost:
	 * 
	 * * http://localhost/mysite              returns an empty string
	 * * http://localhost/mysite/about        returns '/about'
	 * * http://localhost/mysite/enco%20ded   returns '/enco%20ded'
	 * * http://localhost/mysite/about?var=1  returns '/about'
	 *
	 * @static
	 * @return string The raw path (i.e. not urldecoded)

	 */
	 public static function getPathInfo(){
		return parent::getPathInfo();
	 }

	/**
	 * Returns the root path from which this request is executed.
	 * 
	 * Suppose that an index.php file instantiates this request object:
	 * 
	 * * http://localhost/index.php         returns an empty string
	 * * http://localhost/index.php/page    returns an empty string
	 * * http://localhost/web/index.php     returns '/web'
	 * * http://localhost/we%20b/index.php  returns '/we%20b'
	 *
	 * @static
	 * @return string The raw path (i.e. not urldecoded)

	 */
	 public static function getBasePath(){
		return parent::getBasePath();
	 }

	/**
	 * Returns the root url from which this request is executed.
	 * 
	 * The base URL never ends with a /.
	 * 
	 * This is similar to getBasePath(), except that it also includes the
	 * script filename (e.g. index.php) if one exists.
	 *
	 * @static
	 * @return string The raw url (i.e. not urldecoded)

	 */
	 public static function getBaseUrl(){
		return parent::getBaseUrl();
	 }

	/**
	 * Gets the request's scheme.
	 *
	 * @static
	 * @return string

	 */
	 public static function getScheme(){
		return parent::getScheme();
	 }

	/**
	 * Returns the port on which the request is made.
	 * 
	 * This method can read the client port from the "X-Forwarded-Port" header
	 * when trusted proxies were set via "setTrustedProxies()".
	 * 
	 * The "X-Forwarded-Port" header must contain the client port.
	 * 
	 * If your reverse proxy uses a different header name than "X-Forwarded-Port",
	 * configure it via "setTrustedHeaderName()" with the "client-port" key.
	 *
	 * @static
	 * @return string

	 */
	 public static function getPort(){
		return parent::getPort();
	 }

	/**
	 * Returns the user.
	 *
	 * @static
	 * @return string|null
	 */
	 public static function getUser(){
		return parent::getUser();
	 }

	/**
	 * Returns the password.
	 *
	 * @static
	 * @return string|null
	 */
	 public static function getPassword(){
		return parent::getPassword();
	 }

	/**
	 * Gets the user info.
	 *
	 * @static
	 * @return string A user name and, optionally, scheme-specific information about how to gain authorization to access the server
	 */
	 public static function getUserInfo(){
		return parent::getUserInfo();
	 }

	/**
	 * Returns the HTTP host being requested.
	 * 
	 * The port name will be appended to the host if it's non-standard.
	 *
	 * @static
	 * @return string

	 */
	 public static function getHttpHost(){
		return parent::getHttpHost();
	 }

	/**
	 * Returns the requested URI.
	 *
	 * @static
	 * @return string The raw URI (i.e. not urldecoded)

	 */
	 public static function getRequestUri(){
		return parent::getRequestUri();
	 }

	/**
	 * Gets the scheme and HTTP host.
	 * 
	 * If the URL was called with basic authentication, the user
	 * and the password are not added to the generated string.
	 *
	 * @static
	 * @return string The scheme and HTTP host
	 */
	 public static function getSchemeAndHttpHost(){
		return parent::getSchemeAndHttpHost();
	 }

	/**
	 * Generates a normalized URI for the Request.
	 *
	 * @static
	 * @return string A normalized URI for the Request

	 */
	 public static function getUri(){
		return parent::getUri();
	 }

	/**
	 * Generates a normalized URI for the given path.
	 *
	 * @static
	 * @param	string $path A path to use instead of the current one

	 * @return string The normalized URI for the path

	 */
	 public static function getUriForPath($path){
		return parent::getUriForPath($path);
	 }

	/**
	 * Generates the normalized query string for the Request.
	 * 
	 * It builds a normalized query string, where keys/value pairs are alphabetized
	 * and have consistent escaping.
	 *
	 * @static
	 * @return string|null A normalized query string for the Request

	 */
	 public static function getQueryString(){
		return parent::getQueryString();
	 }

	/**
	 * Checks whether the request is secure or not.
	 * 
	 * This method can read the client port from the "X-Forwarded-Proto" header
	 * when trusted proxies were set via "setTrustedProxies()".
	 * 
	 * The "X-Forwarded-Proto" header must contain the protocol: "https" or "http".
	 * 
	 * If your reverse proxy uses a different header name than "X-Forwarded-Proto"
	 * ("SSL_HTTPS" for instance), configure it via "setTrustedHeaderName()" with
	 * the "client-proto" key.
	 *
	 * @static
	 * @return Boolean

	 */
	 public static function isSecure(){
		return parent::isSecure();
	 }

	/**
	 * Returns the host name.
	 * 
	 * This method can read the client port from the "X-Forwarded-Host" header
	 * when trusted proxies were set via "setTrustedProxies()".
	 * 
	 * The "X-Forwarded-Host" header must contain the client host name.
	 * 
	 * If your reverse proxy uses a different header name than "X-Forwarded-Host",
	 * configure it via "setTrustedHeaderName()" with the "client-host" key.
	 *
	 * @static
	 * @return string

	 */
	 public static function getHost(){
		return parent::getHost();
	 }

	/**
	 * Sets the request method.
	 *
	 * @static
	 * @param	string $method

	 */
	 public static function setMethod($method){
		parent::setMethod($method);
	 }

	/**
	 * Gets the request "intended" method.
	 * 
	 * If the X-HTTP-Method-Override header is set, and if the method is a POST,
	 * then it is used to determine the "real" intended HTTP method.
	 * 
	 * The _method request parameter can also be used to determine the HTTP method,
	 * but only if enableHttpMethodParameterOverride() has been called.
	 * 
	 * The method is always an uppercased string.
	 *
	 * @static
	 * @return string The request method

	 */
	 public static function getMethod(){
		return parent::getMethod();
	 }

	/**
	 * Gets the "real" request method.
	 *
	 * @static
	 * @return string The request method

	 */
	 public static function getRealMethod(){
		return parent::getRealMethod();
	 }

	/**
	 * Gets the mime type associated with the format.
	 *
	 * @static
	 * @param	string $format The format

	 * @return string The associated mime type (null if not found)

	 */
	 public static function getMimeType($format){
		return parent::getMimeType($format);
	 }

	/**
	 * Gets the format associated with the mime type.
	 *
	 * @static
	 * @param	string $mimeType The associated mime type

	 * @return string|null The format (null if not found)

	 */
	 public static function getFormat($mimeType){
		return parent::getFormat($mimeType);
	 }

	/**
	 * Associates a format with mime types.
	 *
	 * @static
	 * @param	string	$format	The format
	 * @param	string|array $mimeTypes The associated mime types (the preferred one must be the first as it will be used as the content type)

	 */
	 public static function setFormat($format, $mimeTypes){
		parent::setFormat($format, $mimeTypes);
	 }

	/**
	 * Gets the request format.
	 * 
	 * Here is the process to determine the format:
	 * 
	 * * format defined by the user (with setRequestFormat())
	 * * _format request parameter
	 * * $default
	 *
	 * @static
	 * @param	string $default The default format

	 * @return string The request format

	 */
	 public static function getRequestFormat($default = 'html'){
		return parent::getRequestFormat($default);
	 }

	/**
	 * Sets the request format.
	 *
	 * @static
	 * @param	string $format The request format.

	 */
	 public static function setRequestFormat($format){
		parent::setRequestFormat($format);
	 }

	/**
	 * Gets the format associated with the request.
	 *
	 * @static
	 * @return string|null The format (null if no content type is present)

	 */
	 public static function getContentType(){
		return parent::getContentType();
	 }

	/**
	 * Sets the default locale.
	 *
	 * @static
	 * @param	string $locale

	 */
	 public static function setDefaultLocale($locale){
		parent::setDefaultLocale($locale);
	 }

	/**
	 * Sets the locale.
	 *
	 * @static
	 * @param	string $locale

	 */
	 public static function setLocale($locale){
		parent::setLocale($locale);
	 }

	/**
	 * Get the locale.
	 *
	 * @static
	 * @return string
	 */
	 public static function getLocale(){
		return parent::getLocale();
	 }

	/**
	 * Checks if the request method is of specified type.
	 *
	 * @static
	 * @param	string $method Uppercase request method (GET, POST etc).

	 * @return Boolean
	 */
	 public static function isMethod($method){
		return parent::isMethod($method);
	 }

	/**
	 * Checks whether the method is safe or not.
	 *
	 * @static
	 * @return Boolean

	 */
	 public static function isMethodSafe(){
		return parent::isMethodSafe();
	 }

	/**
	 * Returns the request body content.
	 *
	 * @static
	 * @param	Boolean $asResource If true, a resource will be returned

	 * @return string|resource The request body content or a resource to read the body stream.

	 */
	 public static function getContent($asResource = false){
		return parent::getContent($asResource);
	 }

	/**
	 * Gets the Etags.
	 *
	 * @static
	 * @return array The entity tags
	 */
	 public static function getETags(){
		return parent::getETags();
	 }

	/**
	 * 
	 *
	 * @static
	 * @return Boolean
	 */
	 public static function isNoCache(){
		return parent::isNoCache();
	 }

	/**
	 * Returns the preferred language.
	 *
	 * @static
	 * @param	array $locales An array of ordered available locales

	 * @return string|null The preferred locale

	 */
	 public static function getPreferredLanguage($locales = null){
		return parent::getPreferredLanguage($locales);
	 }

	/**
	 * Gets a list of languages acceptable by the client browser.
	 *
	 * @static
	 * @return array Languages ordered in the user browser preferences

	 */
	 public static function getLanguages(){
		return parent::getLanguages();
	 }

	/**
	 * Gets a list of charsets acceptable by the client browser.
	 *
	 * @static
	 * @return array List of charsets in preferable order

	 */
	 public static function getCharsets(){
		return parent::getCharsets();
	 }

	/**
	 * Gets a list of content types acceptable by the client browser
	 *
	 * @static
	 * @return array List of content types in preferable order

	 */
	 public static function getAcceptableContentTypes(){
		return parent::getAcceptableContentTypes();
	 }

	/**
	 * Returns true if the request is a XMLHttpRequest.
	 * 
	 * It works if your JavaScript library set an X-Requested-With HTTP header.
	 * It is known to work with common JavaScript frameworks:
	 *
	 * @static
	 * @return Boolean true if the request is an XMLHttpRequest, false otherwise

	 */
	 public static function isXmlHttpRequest(){
		return parent::isXmlHttpRequest();
	 }

	/**
	 * Splits an Accept-* HTTP header.
	 *
	 * @static
	 * @param	string $header Header to split

	 * @return array Array indexed by the values of the Accept-* header in preferred order

	 */
	 public static function splitHttpAcceptHeader($header){
		return parent::splitHttpAcceptHeader($header);
	 }

 }
}

namespace  {
 class Lang extends Illuminate\Translation\Translator{
	/**
	 * Create a new translator instance.
	 *
	 * @static
	 * @param	Illuminate\Translation\LoaderInterface	$loader
	 * @param	string	$locale
	 */
	 public static function __construct($loader, $locale){
		parent::__construct($loader, $locale);
	 }

	/**
	 * Determine if a translation exists.
	 *
	 * @static
	 * @param	string	$key
	 * @param	string	$locale
	 * @return bool
	 */
	 public static function has($key, $locale = null){
		return parent::has($key, $locale);
	 }

	/**
	 * Get the translation for the given key.
	 *
	 * @static
	 * @param	string	$key
	 * @param	array	$replace
	 * @param	string	$locale
	 * @return string
	 */
	 public static function get($key, $replace = array(), $locale = null){
		return parent::get($key, $replace, $locale);
	 }

	/**
	 * Get a translation according to an integer value.
	 *
	 * @static
	 * @param	string	$key
	 * @param	int	$number
	 * @param	array	$replace
	 * @param	string	$locale
	 * @return string
	 */
	 public static function choice($key, $number, $replace = array(), $locale = null){
		return parent::choice($key, $number, $replace, $locale);
	 }

	/**
	 * Get the translation for a given key.
	 *
	 * @static
	 * @param	string	$id
	 * @param	array	$parameters
	 * @param	string	$domain
	 * @param	string	$locale
	 * @return string
	 */
	 public static function trans($id, $parameters = array(), $domain = 'messages', $locale = null){
		return parent::trans($id, $parameters, $domain, $locale);
	 }

	/**
	 * Get a translation according to an integer value.
	 *
	 * @static
	 * @param	string	$id
	 * @param	int	$number
	 * @param	array	$parameters
	 * @param	string	$domain
	 * @param	string	$locale
	 * @return string
	 */
	 public static function transChoice($id, $number, $parameters = array(), $domain = 'messages', $locale = null){
		return parent::transChoice($id, $number, $parameters, $domain, $locale);
	 }

	/**
	 * Load the specified language group.
	 *
	 * @static
	 * @param	string	$namespace
	 * @param	string	$group
	 * @param	string	$locale
	 * @return string
	 */
	 public static function load($namespace, $group, $locale){
		return parent::load($namespace, $group, $locale);
	 }

	/**
	 * Add a new namespace to the loader.
	 *
	 * @static
	 * @param	string	$namespace
	 * @param	string	$hint
	 */
	 public static function addNamespace($namespace, $hint){
		parent::addNamespace($namespace, $hint);
	 }

	/**
	 * Parse a key into namespace, group, and item.
	 *
	 * @static
	 * @param	string	$key
	 * @return array
	 */
	 public static function parseKey($key){
		return parent::parseKey($key);
	 }

	/**
	 * Get the message selector instance.
	 *
	 * @static
	 * @return Symfony\Component\Translation\MessageSelector
	 */
	 public static function getSelector(){
		return parent::getSelector();
	 }

	/**
	 * Set the message selector instance.
	 *
	 * @static
	 * @param	Symfony\Component\Translation\MessageSelector	$selector
	 */
	 public static function setSelector($selector){
		parent::setSelector($selector);
	 }

	/**
	 * Get the language line loader implementation.
	 *
	 * @static
	 * @return Illuminate\Translation\LoaderInterface
	 */
	 public static function getLoader(){
		return parent::getLoader();
	 }

	/**
	 * Get the default locale being used.
	 *
	 * @static
	 * @return string
	 */
	 public static function getLocale(){
		return parent::getLocale();
	 }

	/**
	 * Set the default locale.
	 *
	 * @static
	 * @param	string	$locale
	 */
	 public static function setLocale($locale){
		parent::setLocale($locale);
	 }

	/**
	 * Set the parsed value of a key.
	 *
	 * @static
	 * @param	string	$key
	 * @param	array	$parsed
	 */
	 public static function setParsedKey($key, $parsed){
		parent::setParsedKey($key, $parsed);
	 }

 }
}

namespace  {
 class Log extends Illuminate\Log\Writer{
	/**
	 * Create a new log writer instance.
	 *
	 * @static
	 * @param	Monolog\Logger	$monolog
	 * @param	Illuminate\Events\Dispatcher	$dispatcher
	 */
	 public static function __construct($monolog, $dispatcher = null){
		parent::__construct($monolog, $dispatcher);
	 }

	/**
	 * Register a file log handler.
	 *
	 * @static
	 * @param	string	$path
	 * @param	string	$level
	 */
	 public static function useFiles($path, $level = 'debug'){
		parent::useFiles($path, $level);
	 }

	/**
	 * Register a daily file log handler.
	 *
	 * @static
	 * @param	string	$path
	 * @param	int	$days
	 * @param	string	$level
	 */
	 public static function useDailyFiles($path, $days = 0, $level = 'debug'){
		parent::useDailyFiles($path, $days, $level);
	 }

	/**
	 * Get the underlying Monolog instance.
	 *
	 * @static
	 * @return Monolog\Logger
	 */
	 public static function getMonolog(){
		return parent::getMonolog();
	 }

	/**
	 * Register a new callback handler for when
	 * a log event is triggered.
	 *
	 * @static
	 * @param	Closure	$callback
	 */
	 public static function listen($callback){
		parent::listen($callback);
	 }

	/**
	 * Get the event dispatcher instance.
	 *
	 * @static
	 * @return Illuminate\Events\Dispatcher
	 */
	 public static function getEventDispatcher(){
		return parent::getEventDispatcher();
	 }

	/**
	 * Set the event dispatcher instance.
	 *
	 * @static
	 * @param	Illuminate\Events\Dispatcher
	 */
	 public static function setEventDispatcher($dispatcher){
		parent::setEventDispatcher($dispatcher);
	 }

	/**
	 * Dynamically handle error additions.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters
	 * @return mixed
	 */
	 public static function __call($method, $parameters){
		return parent::__call($method, $parameters);
	 }

 }
}

namespace  {
 class Mail extends Illuminate\Mail\Mailer{
	/**
	 * Create a new Mailer instance.
	 *
	 * @static
	 * @param	Illuminate\View\Environment	$views
	 * @param	Swift_Mailer	$swift
	 */
	 public static function __construct($views, $swift){
		parent::__construct($views, $swift);
	 }

	/**
	 * Set the global from address and name.
	 *
	 * @static
	 * @param	string	$address
	 * @param	string	$name
	 */
	 public static function alwaysFrom($address, $name = null){
		parent::alwaysFrom($address, $name);
	 }

	/**
	 * Send a new message when only a plain part.
	 *
	 * @static
	 * @param	string	$view
	 * @param	array	$data
	 * @param	mixed	$callback
	 */
	 public static function plain($view, $data, $callback){
		parent::plain($view, $data, $callback);
	 }

	/**
	 * Send a new message using a view.
	 *
	 * @static
	 * @param	string|array	$view
	 * @param	array	$data
	 * @param	Closure|string	$callback
	 */
	 public static function send($view, $data, $callback){
		parent::send($view, $data, $callback);
	 }

	/**
	 * Tell the mailer to not really send messages.
	 *
	 * @static
	 * @param	bool	$value
	 */
	 public static function pretend($value = true){
		parent::pretend($value);
	 }

	/**
	 * Get the view environment instance.
	 *
	 * @static
	 * @return Illuminate\View\Environment
	 */
	 public static function getViewEnvironment(){
		return parent::getViewEnvironment();
	 }

	/**
	 * Get the Swift Mailer instance.
	 *
	 * @static
	 * @return Swift_Mailer
	 */
	 public static function getSwiftMailer(){
		return parent::getSwiftMailer();
	 }

	/**
	 * Set the Swift Mailer instance.
	 *
	 * @static
	 * @param	Swift_Mailer	$swift
	 */
	 public static function setSwiftMailer($swift){
		parent::setSwiftMailer($swift);
	 }

	/**
	 * Set the log writer instance.
	 *
	 * @static
	 * @param	Illuminate\Log\Writer	$logger
	 */
	 public static function setLogger($logger){
		parent::setLogger($logger);
	 }

	/**
	 * Set the IoC container instance.
	 *
	 * @static
	 * @param	Illuminate\Container\Container	$container
	 */
	 public static function setContainer($container){
		parent::setContainer($container);
	 }

 }
}

namespace  {
 class Paginator extends Bootstrapper\Paginator{
	/**
	 * Create the HTML pagination links.
	 *
	 * @static
	 * @param	bool $align align pager

	 * @return string
	 */
	 public static function pager($align = false){
		return parent::pager($align);
	 }

	/**
	 * Create the HTML pagination links.
	 * 
	 * Typically, an intelligent, "sliding" window of links will be rendered based
	 * on the total number of pages, the current page, and the number of adjacent
	 * pages that should rendered. This creates a beautiful paginator similar to
	 * that of Google's.
	 * 
	 * Example: 1 2 ... 23 24 25 [26] 27 28 29 ... 51 52
	 * 
	 * If you wish to render only certain elements of the pagination control,
	 * explore some of the other public methods available on the instance.
	 * 
	 * <code>
	 * // Render the pagination links
	 * echo $paginator->links();
	 * 
	 * // Render the pagination links using a given window size
	 * echo $paginator->links(5);
	 * </code>
	 *
	 * @static
	 * @param	int	$adjacent	Number of adjacent items
	 * @param	string $alignment Alignment of pagination

	 * @return string
	 */
	 public static function links($adjacent = 3, $alignment = '', $size = ''){
		return parent::links($adjacent, $alignment, $size);
	 }

	/**
	 * Create a new Paginator instance.
	 *
	 * @static
	 * @param	Illuminate\Pagination\Environment	$env
	 * @param	array	$items
	 * @param	int	$total
	 * @param	int	$perPage
	 */
	 public static function __construct($env, $items, $total, $perPage){
		parent::__construct($env, $items, $total, $perPage);
	 }

	/**
	 * Setup the pagination context (current and last page).
	 *
	 * @static
	 * @return Illuminate\Pagination\Paginator
	 */
	 public static function setupPaginationContext(){
		return parent::setupPaginationContext();
	 }

	/**
	 * Get a URL for a given page number.
	 *
	 * @static
	 * @param	int	$page
	 * @return string
	 */
	 public static function getUrl($page){
		return parent::getUrl($page);
	 }

	/**
	 * Add a query string value to the paginator.
	 *
	 * @static
	 * @param	string	$key
	 * @param	string	$value
	 * @return Illuminate\Pagination\Paginator
	 */
	 public static function appends($key, $value){
		return parent::appends($key, $value);
	 }

	/**
	 * Add a query string value to the paginator.
	 *
	 * @static
	 * @param	string	$key
	 * @param	string	$value
	 * @return Illuminate\Pagination\Paginator
	 */
	 public static function addQuery($key, $value){
		return parent::addQuery($key, $value);
	 }

	/**
	 * Get the current page for the request.
	 *
	 * @static
	 * @return int
	 */
	 public static function getCurrentPage(){
		return parent::getCurrentPage();
	 }

	/**
	 * Get the last page that should be available.
	 *
	 * @static
	 * @return int
	 */
	 public static function getLastPage(){
		return parent::getLastPage();
	 }

	/**
	 * Get the items being paginated.
	 *
	 * @static
	 * @return array
	 */
	 public static function getItems(){
		return parent::getItems();
	 }

	/**
	 * Get the total number of items in the collection.
	 *
	 * @static
	 * @return int
	 */
	 public static function getTotal(){
		return parent::getTotal();
	 }

	/**
	 * Get an iterator for the items.
	 *
	 * @static
	 * @return ArrayIterator
	 */
	 public static function getIterator(){
		return parent::getIterator();
	 }

	/**
	 * Determine if the list of items is empty or not.
	 *
	 * @static
	 * @return bool
	 */
	 public static function isEmpty(){
		return parent::isEmpty();
	 }

	/**
	 * Get the number of items for the current page.
	 *
	 * @static
	 * @return int
	 */
	 public static function count(){
		return parent::count();
	 }

	/**
	 * Determine if the given item exists.
	 *
	 * @static
	 * @param	mixed	$key
	 * @return bool
	 */
	 public static function offsetExists($key){
		return parent::offsetExists($key);
	 }

	/**
	 * Get the item at the given offset.
	 *
	 * @static
	 * @param	mixed	$key
	 * @return mixed
	 */
	 public static function offsetGet($key){
		return parent::offsetGet($key);
	 }

	/**
	 * Set the item at the given offset.
	 *
	 * @static
	 * @param	mixed	$key
	 * @param	mixed	$value
	 */
	 public static function offsetSet($key, $value){
		parent::offsetSet($key, $value);
	 }

	/**
	 * Unset the item at the given key.
	 *
	 * @static
	 * @param	mixed	$key
	 */
	 public static function offsetUnset($key){
		parent::offsetUnset($key);
	 }

 }
}

namespace  {
 class Password extends Illuminate\Auth\Reminders\PasswordBroker{
	/**
	 * Create a new password broker instance.
	 *
	 * @static
	 * @param	Illuminate\Auth\Reminders\ReminderRepositoryInterface	$reminders
	 * @param	Illuminate\Auth\UserProviderInterface	$users
	 * @param	Illuminate\Routing\Redirector	$redirect
	 * @param	Illuminate\Mail\Mailer	$mailer
	 * @param	string	$reminderView
	 */
	 public static function __construct($reminders, $users, $redirect, $mailer, $reminderView){
		parent::__construct($reminders, $users, $redirect, $mailer, $reminderView);
	 }

	/**
	 * Send a password reminder to a user.
	 *
	 * @static
	 * @param	array	$credentials
	 * @param	Closure	$callback
	 * @return Illuminate\Http\RedirectResponse
	 */
	 public static function remind($credentials, $callback = null){
		return parent::remind($credentials, $callback);
	 }

	/**
	 * Send the password reminder e-mail.
	 *
	 * @static
	 * @param	Illuminate\Auth\Reminders\RemindableInterface	$user
	 * @param	string	$token
	 * @param	Closure	$callback
	 */
	 public static function sendReminder($user, $token, $callback = null){
		parent::sendReminder($user, $token, $callback);
	 }

	/**
	 * Reset the password for the given token.
	 *
	 * @static
	 * @param	array	$credentials
	 * @param	Closure	$callback
	 * @return mixed
	 */
	 public static function reset($credentials, $callback){
		return parent::reset($credentials, $callback);
	 }

	/**
	 * Get the user for the given credentials.
	 *
	 * @static
	 * @param	array	$credentials
	 * @return Illuminate\Auth\Reminders\RemindableInterface
	 */
	 public static function getUser($credentials){
		return parent::getUser($credentials);
	 }

 }
}

namespace  {
 class Redirect extends Illuminate\Routing\Redirector{
	/**
	 * Create a new Redirector instance.
	 *
	 * @static
	 * @param	Illuminate\Routing\UrlGenerator	$generator
	 */
	 public static function __construct($generator){
		parent::__construct($generator);
	 }

	/**
	 * Create a new redirect response to the previous location.
	 *
	 * @static
	 * @param	int	$status
	 * @param	array	$headers
	 * @return Illuminate\Http\RedirectResponse
	 */
	 public static function back($status = 302, $headers = array()){
		return parent::back($status, $headers);
	 }

	/**
	 * Create a new redirect response to the current URI.
	 *
	 * @static
	 * @param	int	$status
	 * @param	array	$headers
	 * @return Illuminate\Http\RedirectResponse
	 */
	 public static function refresh($status = 302, $headers = array()){
		return parent::refresh($status, $headers);
	 }

	/**
	 * Create a new redirect response to the given path.
	 *
	 * @static
	 * @param	string	$path
	 * @param	int	$status
	 * @param	array	$headers
	 * @param	bool	$secure
	 * @return Illuminate\Http\RedirectResponse
	 */
	 public static function to($path, $status = 302, $headers = array(), $secure = null){
		return parent::to($path, $status, $headers, $secure);
	 }

	/**
	 * Create a new redirect response to the given HTTPS path.
	 *
	 * @static
	 * @param	string	$path
	 * @param	int	$status
	 * @param	array	$headers
	 * @return Illuminate\Http\RedirectResponse
	 */
	 public static function secure($path, $status = 302, $headers = array()){
		return parent::secure($path, $status, $headers);
	 }

	/**
	 * Create a new redirect response to a named route.
	 *
	 * @static
	 * @param	string	$route
	 * @param	array	$parameters
	 * @param	int	$status
	 * @param	array	$headers
	 * @return Illuminate\Http\RedirectResponse
	 */
	 public static function route($route, $parameters = array(), $status = 302, $headers = array()){
		return parent::route($route, $parameters, $status, $headers);
	 }

	/**
	 * Create a new redirect response to a controller action.
	 *
	 * @static
	 * @param	string	$action
	 * @param	array	$parameters
	 * @param	int	$status
	 * @param	array	$headers
	 * @return Illuminate\Http\RedirectResponse
	 */
	 public static function action($action, $parameters = array(), $status = 302, $headers = array()){
		return parent::action($action, $parameters, $status, $headers);
	 }

	/**
	 * Get the URL generator instance.
	 *
	 * @static
	 * @return Illuminate\Routing\UrlGenerator
	 */
	 public static function getUrlGenerator(){
		return parent::getUrlGenerator();
	 }

	/**
	 * Set the active session store.
	 *
	 * @static
	 * @param	Illuminate\Session\Store	$session
	 */
	 public static function setSession($session){
		parent::setSession($session);
	 }

 }
}

namespace  {
 class Request extends Illuminate\Http\Request{
	/**
	 * Return the Request instance.
	 *
	 * @static
	 * @return Illuminate\Http\Request
	 */
	 public static function instance(){
		return parent::instance();
	 }

	/**
	 * Get the root URL for the application.
	 *
	 * @static
	 * @return string
	 */
	 public static function root(){
		return parent::root();
	 }

	/**
	 * Get the URL (no query string) for the request.
	 *
	 * @static
	 * @return string
	 */
	 public static function url(){
		return parent::url();
	 }

	/**
	 * Get the full URL for the request.
	 *
	 * @static
	 * @return string
	 */
	 public static function fullUrl(){
		return parent::fullUrl();
	 }

	/**
	 * Get the current path info for the request.
	 *
	 * @static
	 * @return string
	 */
	 public static function path(){
		return parent::path();
	 }

	/**
	 * Get a segment from the URI (1 based index).
	 *
	 * @static
	 * @param	string	$index
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function segment($index, $default = null){
		return parent::segment($index, $default);
	 }

	/**
	 * Get all of the segments for the request path.
	 *
	 * @static
	 * @return array
	 */
	 public static function segments(){
		return parent::segments();
	 }

	/**
	 * Determine if the current request URI matches a pattern.
	 *
	 * @static
	 * @param	string	$pattern
	 * @return bool
	 */
	 public static function is($pattern){
		return parent::is($pattern);
	 }

	/**
	 * Determine if the request is the result of an AJAX call.
	 *
	 * @static
	 * @return bool
	 */
	 public static function ajax(){
		return parent::ajax();
	 }

	/**
	 * Determine if the request is over HTTPS.
	 *
	 * @static
	 * @return bool
	 */
	 public static function secure(){
		return parent::secure();
	 }

	/**
	 * Determine if the request contains a given input item.
	 *
	 * @static
	 * @param	string|array	$key
	 * @return bool
	 */
	 public static function has($key){
		return parent::has($key);
	 }

	/**
	 * Get all of the input and files for the request.
	 *
	 * @static
	 * @return array
	 */
	 public static function all(){
		return parent::all();
	 }

	/**
	 * Retrieve an input item from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function input($key = null, $default = null){
		return parent::input($key, $default);
	 }

	/**
	 * Get a subset of the items from the input data.
	 *
	 * @static
	 * @param	array	$keys
	 * @return array
	 */
	 public static function only($keys){
		return parent::only($keys);
	 }

	/**
	 * Get all of the input except for a specified array of items.
	 *
	 * @static
	 * @param	array	$keys
	 * @return array
	 */
	 public static function except($keys){
		return parent::except($keys);
	 }

	/**
	 * Retrieve a query string item from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function query($key = null, $default = null){
		return parent::query($key, $default);
	 }

	/**
	 * Retrieve a cookie from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function cookie($key = null, $default = null){
		return parent::cookie($key, $default);
	 }

	/**
	 * Retrieve a file from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return Symfony\Component\HttpFoundation\File\UploadedFile
	 */
	 public static function file($key = null, $default = null){
		return parent::file($key, $default);
	 }

	/**
	 * Determine if the uploaded data contains a file.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function hasFile($key){
		return parent::hasFile($key);
	 }

	/**
	 * Retrieve a header from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function header($key = null, $default = null){
		return parent::header($key, $default);
	 }

	/**
	 * Retrieve a server variable from the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function server($key = null, $default = null){
		return parent::server($key, $default);
	 }

	/**
	 * Retrieve an old input item.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return string
	 */
	 public static function old($key = null, $default = null){
		return parent::old($key, $default);
	 }

	/**
	 * Flash the input for the current request to the session.
	 *
	 * @static
	 * @param	string $filter
	 * @param	array	$keys
	 */
	 public static function flash($filter = null, $keys = array()){
		parent::flash($filter, $keys);
	 }

	/**
	 * Flash only some of the input to the session.
	 *
	 * @static
	 * @param	dynamic	string
	 */
	 public static function flashOnly($keys){
		parent::flashOnly($keys);
	 }

	/**
	 * Flash only some of the input to the session.
	 *
	 * @static
	 * @param	dynamic	string
	 */
	 public static function flashExcept($keys){
		parent::flashExcept($keys);
	 }

	/**
	 * Flush all of the old input from the session.
	 *
	 * @static
	 */
	 public static function flush(){
		parent::flush();
	 }

	/**
	 * Merge new input into the current request's input array.
	 *
	 * @static
	 * @param	array	$input
	 */
	 public static function merge($input){
		parent::merge($input);
	 }

	/**
	 * Replace the input for the current request.
	 *
	 * @static
	 * @param	array	$input
	 */
	 public static function replace($input){
		parent::replace($input);
	 }

	/**
	 * Get the JSON payload for the request.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return mixed
	 */
	 public static function json($key = null, $default = null){
		return parent::json($key, $default);
	 }

	/**
	 * Get the Illuminate session store implementation.
	 *
	 * @static
	 * @return Illuminate\Session\Store
	 */
	 public static function getSessionStore(){
		return parent::getSessionStore();
	 }

	/**
	 * Set the Illuminate session store implementation.
	 *
	 * @static
	 * @param	Illuminate\Session\Store	$session
	 */
	 public static function setSessionStore($session){
		parent::setSessionStore($session);
	 }

	/**
	 * Determine if the session store has been set.
	 *
	 * @static
	 * @return bool
	 */
	 public static function hasSessionStore(){
		return parent::hasSessionStore();
	 }

	/**
	 * Constructor.
	 *
	 * @static
	 * @param	array	$query	The GET parameters
	 * @param	array	$request	The POST parameters
	 * @param	array	$attributes The request attributes (parameters parsed from the PATH_INFO, ...)
	 * @param	array	$cookies	The COOKIE parameters
	 * @param	array	$files	The FILES parameters
	 * @param	array	$server	The SERVER parameters
	 * @param	string $content	The raw body data

	 */
	 public static function __construct($query = array(), $request = array(), $attributes = array(), $cookies = array(), $files = array(), $server = array(), $content = null){
		parent::__construct($query, $request, $attributes, $cookies, $files, $server, $content);
	 }

	/**
	 * Sets the parameters for this request.
	 * 
	 * This method also re-initializes all properties.
	 *
	 * @static
	 * @param	array	$query	The GET parameters
	 * @param	array	$request	The POST parameters
	 * @param	array	$attributes The request attributes (parameters parsed from the PATH_INFO, ...)
	 * @param	array	$cookies	The COOKIE parameters
	 * @param	array	$files	The FILES parameters
	 * @param	array	$server	The SERVER parameters
	 * @param	string $content	The raw body data

	 */
	 public static function initialize($query = array(), $request = array(), $attributes = array(), $cookies = array(), $files = array(), $server = array(), $content = null){
		parent::initialize($query, $request, $attributes, $cookies, $files, $server, $content);
	 }

	/**
	 * Creates a new request with values from PHP's super globals.
	 *
	 * @static
	 * @return Request A new request

	 */
	 public static function createFromGlobals(){
		return parent::createFromGlobals();
	 }

	/**
	 * Creates a Request based on a given URI and configuration.
	 * 
	 * The information contained in the URI always take precedence
	 * over the other information (server and parameters).
	 *
	 * @static
	 * @param	string $uri	The URI
	 * @param	string $method	The HTTP method
	 * @param	array	$parameters The query (GET) or request (POST) parameters
	 * @param	array	$cookies	The request cookies ($_COOKIE)
	 * @param	array	$files	The request files ($_FILES)
	 * @param	array	$server	The server parameters ($_SERVER)
	 * @param	string $content	The raw body data

	 * @return Request A Request instance

	 */
	 public static function create($uri, $method = 'GET', $parameters = array(), $cookies = array(), $files = array(), $server = array(), $content = null){
		return parent::create($uri, $method, $parameters, $cookies, $files, $server, $content);
	 }

	/**
	 * Clones a request and overrides some of its parameters.
	 *
	 * @static
	 * @param	array $query	The GET parameters
	 * @param	array $request	The POST parameters
	 * @param	array $attributes The request attributes (parameters parsed from the PATH_INFO, ...)
	 * @param	array $cookies	The COOKIE parameters
	 * @param	array $files	The FILES parameters
	 * @param	array $server	The SERVER parameters

	 * @return Request The duplicated request

	 */
	 public static function duplicate($query = null, $request = null, $attributes = null, $cookies = null, $files = null, $server = null){
		return parent::duplicate($query, $request, $attributes, $cookies, $files, $server);
	 }

	/**
	 * Returns the request as a string.
	 *
	 * @static
	 * @return string The request
	 */
	 public static function __toString(){
		return parent::__toString();
	 }

	/**
	 * Overrides the PHP global variables according to this request instance.
	 * 
	 * It overrides $_GET, $_POST, $_REQUEST, $_SERVER, $_COOKIE.
	 * $_FILES is never override, see rfc1867
	 *
	 * @static
	 */
	 public static function overrideGlobals(){
		parent::overrideGlobals();
	 }

	/**
	 * Trusts $_SERVER entries coming from proxies.
	 *
	 * @static
	 */
	 public static function trustProxyData(){
		parent::trustProxyData();
	 }

	/**
	 * Sets a list of trusted proxies.
	 * 
	 * You should only list the reverse proxies that you manage directly.
	 *
	 * @static
	 * @param	array $proxies A list of trusted proxies

	 */
	 public static function setTrustedProxies($proxies){
		parent::setTrustedProxies($proxies);
	 }

	/**
	 * Gets the list of trusted proxies.
	 *
	 * @static
	 * @return array An array of trusted proxies.
	 */
	 public static function getTrustedProxies(){
		return parent::getTrustedProxies();
	 }

	/**
	 * Sets the name for trusted headers.
	 * 
	 * The following header keys are supported:
	 * 
	 * * Request::HEADER_CLIENT_IP:    defaults to X-Forwarded-For   (see getClientIp())
	 * * Request::HEADER_CLIENT_HOST:  defaults to X-Forwarded-Host  (see getClientHost())
	 * * Request::HEADER_CLIENT_PORT:  defaults to X-Forwarded-Port  (see getClientPort())
	 * * Request::HEADER_CLIENT_PROTO: defaults to X-Forwarded-Proto (see getScheme() and isSecure())
	 * 
	 * Setting an empty value allows to disable the trusted header for the given key.
	 *
	 * @static
	 * @param	string $key	The header key
	 * @param	string $value The header name

	 */
	 public static function setTrustedHeaderName($key, $value){
		parent::setTrustedHeaderName($key, $value);
	 }

	/**
	 * Returns true if $_SERVER entries coming from proxies are trusted,
	 * false otherwise.
	 *
	 * @static
	 * @return boolean

	 */
	 public static function isProxyTrusted(){
		return parent::isProxyTrusted();
	 }

	/**
	 * Normalizes a query string.
	 * 
	 * It builds a normalized query string, where keys/value pairs are alphabetized,
	 * have consistent escaping and unneeded delimiters are removed.
	 *
	 * @static
	 * @param	string $qs Query string

	 * @return string A normalized query string for the Request
	 */
	 public static function normalizeQueryString($qs){
		return parent::normalizeQueryString($qs);
	 }

	/**
	 * Enables support for the _method request parameter to determine the intended HTTP method.
	 * 
	 * Be warned that enabling this feature might lead to CSRF issues in your code.
	 * Check that you are using CSRF tokens when required.
	 * 
	 * The HTTP method can only be overridden when the real HTTP method is POST.
	 *
	 * @static
	 */
	 public static function enableHttpMethodParameterOverride(){
		parent::enableHttpMethodParameterOverride();
	 }

	/**
	 * Checks whether support for the _method request parameter is enabled.
	 *
	 * @static
	 * @return Boolean True when the _method request parameter is enabled, false otherwise
	 */
	 public static function getHttpMethodParameterOverride(){
		return parent::getHttpMethodParameterOverride();
	 }

	/**
	 * Gets a "parameter" value.
	 * 
	 * This method is mainly useful for libraries that want to provide some flexibility.
	 * 
	 * Order of precedence: GET, PATH, POST
	 * 
	 * Avoid using this method in controllers:
	 * 
	 * * slow
	 * * prefer to get from a "named" source
	 * 
	 * It is better to explicitly get request parameters from the appropriate
	 * public property instead (query, attributes, request).
	 *
	 * @static
	 * @param	string	$key	the key
	 * @param	mixed	$default the default value
	 * @param	Boolean $deep	is parameter deep in multidimensional array

	 * @return mixed
	 */
	 public static function get($key, $default = null, $deep = false){
		return parent::get($key, $default, $deep);
	 }

	/**
	 * Gets the Session.
	 *
	 * @static
	 * @return SessionInterface|null The session

	 */
	 public static function getSession(){
		return parent::getSession();
	 }

	/**
	 * Whether the request contains a Session which was started in one of the
	 * previous requests.
	 *
	 * @static
	 * @return Boolean

	 */
	 public static function hasPreviousSession(){
		return parent::hasPreviousSession();
	 }

	/**
	 * Whether the request contains a Session object.
	 * 
	 * This method does not give any information about the state of the session object,
	 * like whether the session is started or not. It is just a way to check if this Request
	 * is associated with a Session instance.
	 *
	 * @static
	 * @return Boolean true when the Request contains a Session object, false otherwise

	 */
	 public static function hasSession(){
		return parent::hasSession();
	 }

	/**
	 * Sets the Session.
	 *
	 * @static
	 * @param	SessionInterface $session The Session

	 */
	 public static function setSession($session){
		parent::setSession($session);
	 }

	/**
	 * Returns the client IP address.
	 * 
	 * This method can read the client IP address from the "X-Forwarded-For" header
	 * when trusted proxies were set via "setTrustedProxies()". The "X-Forwarded-For"
	 * header value is a comma+space separated list of IP addresses, the left-most
	 * being the original client, and each successive proxy that passed the request
	 * adding the IP address where it received the request from.
	 * 
	 * If your reverse proxy uses a different header name than "X-Forwarded-For",
	 * ("Client-Ip" for instance), configure it via "setTrustedHeaderName()" with
	 * the "client-ip" key.
	 *
	 * @static
	 * @return string The client IP address

	 */
	 public static function getClientIp(){
		return parent::getClientIp();
	 }

	/**
	 * Returns current script name.
	 *
	 * @static
	 * @return string

	 */
	 public static function getScriptName(){
		return parent::getScriptName();
	 }

	/**
	 * Returns the path being requested relative to the executed script.
	 * 
	 * The path info always starts with a /.
	 * 
	 * Suppose this request is instantiated from /mysite on localhost:
	 * 
	 * * http://localhost/mysite              returns an empty string
	 * * http://localhost/mysite/about        returns '/about'
	 * * http://localhost/mysite/enco%20ded   returns '/enco%20ded'
	 * * http://localhost/mysite/about?var=1  returns '/about'
	 *
	 * @static
	 * @return string The raw path (i.e. not urldecoded)

	 */
	 public static function getPathInfo(){
		return parent::getPathInfo();
	 }

	/**
	 * Returns the root path from which this request is executed.
	 * 
	 * Suppose that an index.php file instantiates this request object:
	 * 
	 * * http://localhost/index.php         returns an empty string
	 * * http://localhost/index.php/page    returns an empty string
	 * * http://localhost/web/index.php     returns '/web'
	 * * http://localhost/we%20b/index.php  returns '/we%20b'
	 *
	 * @static
	 * @return string The raw path (i.e. not urldecoded)

	 */
	 public static function getBasePath(){
		return parent::getBasePath();
	 }

	/**
	 * Returns the root url from which this request is executed.
	 * 
	 * The base URL never ends with a /.
	 * 
	 * This is similar to getBasePath(), except that it also includes the
	 * script filename (e.g. index.php) if one exists.
	 *
	 * @static
	 * @return string The raw url (i.e. not urldecoded)

	 */
	 public static function getBaseUrl(){
		return parent::getBaseUrl();
	 }

	/**
	 * Gets the request's scheme.
	 *
	 * @static
	 * @return string

	 */
	 public static function getScheme(){
		return parent::getScheme();
	 }

	/**
	 * Returns the port on which the request is made.
	 * 
	 * This method can read the client port from the "X-Forwarded-Port" header
	 * when trusted proxies were set via "setTrustedProxies()".
	 * 
	 * The "X-Forwarded-Port" header must contain the client port.
	 * 
	 * If your reverse proxy uses a different header name than "X-Forwarded-Port",
	 * configure it via "setTrustedHeaderName()" with the "client-port" key.
	 *
	 * @static
	 * @return string

	 */
	 public static function getPort(){
		return parent::getPort();
	 }

	/**
	 * Returns the user.
	 *
	 * @static
	 * @return string|null
	 */
	 public static function getUser(){
		return parent::getUser();
	 }

	/**
	 * Returns the password.
	 *
	 * @static
	 * @return string|null
	 */
	 public static function getPassword(){
		return parent::getPassword();
	 }

	/**
	 * Gets the user info.
	 *
	 * @static
	 * @return string A user name and, optionally, scheme-specific information about how to gain authorization to access the server
	 */
	 public static function getUserInfo(){
		return parent::getUserInfo();
	 }

	/**
	 * Returns the HTTP host being requested.
	 * 
	 * The port name will be appended to the host if it's non-standard.
	 *
	 * @static
	 * @return string

	 */
	 public static function getHttpHost(){
		return parent::getHttpHost();
	 }

	/**
	 * Returns the requested URI.
	 *
	 * @static
	 * @return string The raw URI (i.e. not urldecoded)

	 */
	 public static function getRequestUri(){
		return parent::getRequestUri();
	 }

	/**
	 * Gets the scheme and HTTP host.
	 * 
	 * If the URL was called with basic authentication, the user
	 * and the password are not added to the generated string.
	 *
	 * @static
	 * @return string The scheme and HTTP host
	 */
	 public static function getSchemeAndHttpHost(){
		return parent::getSchemeAndHttpHost();
	 }

	/**
	 * Generates a normalized URI for the Request.
	 *
	 * @static
	 * @return string A normalized URI for the Request

	 */
	 public static function getUri(){
		return parent::getUri();
	 }

	/**
	 * Generates a normalized URI for the given path.
	 *
	 * @static
	 * @param	string $path A path to use instead of the current one

	 * @return string The normalized URI for the path

	 */
	 public static function getUriForPath($path){
		return parent::getUriForPath($path);
	 }

	/**
	 * Generates the normalized query string for the Request.
	 * 
	 * It builds a normalized query string, where keys/value pairs are alphabetized
	 * and have consistent escaping.
	 *
	 * @static
	 * @return string|null A normalized query string for the Request

	 */
	 public static function getQueryString(){
		return parent::getQueryString();
	 }

	/**
	 * Checks whether the request is secure or not.
	 * 
	 * This method can read the client port from the "X-Forwarded-Proto" header
	 * when trusted proxies were set via "setTrustedProxies()".
	 * 
	 * The "X-Forwarded-Proto" header must contain the protocol: "https" or "http".
	 * 
	 * If your reverse proxy uses a different header name than "X-Forwarded-Proto"
	 * ("SSL_HTTPS" for instance), configure it via "setTrustedHeaderName()" with
	 * the "client-proto" key.
	 *
	 * @static
	 * @return Boolean

	 */
	 public static function isSecure(){
		return parent::isSecure();
	 }

	/**
	 * Returns the host name.
	 * 
	 * This method can read the client port from the "X-Forwarded-Host" header
	 * when trusted proxies were set via "setTrustedProxies()".
	 * 
	 * The "X-Forwarded-Host" header must contain the client host name.
	 * 
	 * If your reverse proxy uses a different header name than "X-Forwarded-Host",
	 * configure it via "setTrustedHeaderName()" with the "client-host" key.
	 *
	 * @static
	 * @return string

	 */
	 public static function getHost(){
		return parent::getHost();
	 }

	/**
	 * Sets the request method.
	 *
	 * @static
	 * @param	string $method

	 */
	 public static function setMethod($method){
		parent::setMethod($method);
	 }

	/**
	 * Gets the request "intended" method.
	 * 
	 * If the X-HTTP-Method-Override header is set, and if the method is a POST,
	 * then it is used to determine the "real" intended HTTP method.
	 * 
	 * The _method request parameter can also be used to determine the HTTP method,
	 * but only if enableHttpMethodParameterOverride() has been called.
	 * 
	 * The method is always an uppercased string.
	 *
	 * @static
	 * @return string The request method

	 */
	 public static function getMethod(){
		return parent::getMethod();
	 }

	/**
	 * Gets the "real" request method.
	 *
	 * @static
	 * @return string The request method

	 */
	 public static function getRealMethod(){
		return parent::getRealMethod();
	 }

	/**
	 * Gets the mime type associated with the format.
	 *
	 * @static
	 * @param	string $format The format

	 * @return string The associated mime type (null if not found)

	 */
	 public static function getMimeType($format){
		return parent::getMimeType($format);
	 }

	/**
	 * Gets the format associated with the mime type.
	 *
	 * @static
	 * @param	string $mimeType The associated mime type

	 * @return string|null The format (null if not found)

	 */
	 public static function getFormat($mimeType){
		return parent::getFormat($mimeType);
	 }

	/**
	 * Associates a format with mime types.
	 *
	 * @static
	 * @param	string	$format	The format
	 * @param	string|array $mimeTypes The associated mime types (the preferred one must be the first as it will be used as the content type)

	 */
	 public static function setFormat($format, $mimeTypes){
		parent::setFormat($format, $mimeTypes);
	 }

	/**
	 * Gets the request format.
	 * 
	 * Here is the process to determine the format:
	 * 
	 * * format defined by the user (with setRequestFormat())
	 * * _format request parameter
	 * * $default
	 *
	 * @static
	 * @param	string $default The default format

	 * @return string The request format

	 */
	 public static function getRequestFormat($default = 'html'){
		return parent::getRequestFormat($default);
	 }

	/**
	 * Sets the request format.
	 *
	 * @static
	 * @param	string $format The request format.

	 */
	 public static function setRequestFormat($format){
		parent::setRequestFormat($format);
	 }

	/**
	 * Gets the format associated with the request.
	 *
	 * @static
	 * @return string|null The format (null if no content type is present)

	 */
	 public static function getContentType(){
		return parent::getContentType();
	 }

	/**
	 * Sets the default locale.
	 *
	 * @static
	 * @param	string $locale

	 */
	 public static function setDefaultLocale($locale){
		parent::setDefaultLocale($locale);
	 }

	/**
	 * Sets the locale.
	 *
	 * @static
	 * @param	string $locale

	 */
	 public static function setLocale($locale){
		parent::setLocale($locale);
	 }

	/**
	 * Get the locale.
	 *
	 * @static
	 * @return string
	 */
	 public static function getLocale(){
		return parent::getLocale();
	 }

	/**
	 * Checks if the request method is of specified type.
	 *
	 * @static
	 * @param	string $method Uppercase request method (GET, POST etc).

	 * @return Boolean
	 */
	 public static function isMethod($method){
		return parent::isMethod($method);
	 }

	/**
	 * Checks whether the method is safe or not.
	 *
	 * @static
	 * @return Boolean

	 */
	 public static function isMethodSafe(){
		return parent::isMethodSafe();
	 }

	/**
	 * Returns the request body content.
	 *
	 * @static
	 * @param	Boolean $asResource If true, a resource will be returned

	 * @return string|resource The request body content or a resource to read the body stream.

	 */
	 public static function getContent($asResource = false){
		return parent::getContent($asResource);
	 }

	/**
	 * Gets the Etags.
	 *
	 * @static
	 * @return array The entity tags
	 */
	 public static function getETags(){
		return parent::getETags();
	 }

	/**
	 * 
	 *
	 * @static
	 * @return Boolean
	 */
	 public static function isNoCache(){
		return parent::isNoCache();
	 }

	/**
	 * Returns the preferred language.
	 *
	 * @static
	 * @param	array $locales An array of ordered available locales

	 * @return string|null The preferred locale

	 */
	 public static function getPreferredLanguage($locales = null){
		return parent::getPreferredLanguage($locales);
	 }

	/**
	 * Gets a list of languages acceptable by the client browser.
	 *
	 * @static
	 * @return array Languages ordered in the user browser preferences

	 */
	 public static function getLanguages(){
		return parent::getLanguages();
	 }

	/**
	 * Gets a list of charsets acceptable by the client browser.
	 *
	 * @static
	 * @return array List of charsets in preferable order

	 */
	 public static function getCharsets(){
		return parent::getCharsets();
	 }

	/**
	 * Gets a list of content types acceptable by the client browser
	 *
	 * @static
	 * @return array List of content types in preferable order

	 */
	 public static function getAcceptableContentTypes(){
		return parent::getAcceptableContentTypes();
	 }

	/**
	 * Returns true if the request is a XMLHttpRequest.
	 * 
	 * It works if your JavaScript library set an X-Requested-With HTTP header.
	 * It is known to work with common JavaScript frameworks:
	 *
	 * @static
	 * @return Boolean true if the request is an XMLHttpRequest, false otherwise

	 */
	 public static function isXmlHttpRequest(){
		return parent::isXmlHttpRequest();
	 }

	/**
	 * Splits an Accept-* HTTP header.
	 *
	 * @static
	 * @param	string $header Header to split

	 * @return array Array indexed by the values of the Accept-* header in preferred order

	 */
	 public static function splitHttpAcceptHeader($header){
		return parent::splitHttpAcceptHeader($header);
	 }

 }
}

namespace  {
 class Response extends Illuminate\Support\Facades\Response{
	/**
	 * Return a new response from the application.
	 *
	 * @static
	 * @param	string	$content
	 * @param	int	$status
	 * @param	array	$headers
	 * @return Symfony\Component\HttpFoundation\Response
	 */
	 public static function make($content = '', $status = 200, $headers = array()){
		return parent::make($content, $status, $headers);
	 }

	/**
	 * Return a new JSON response from the application.
	 *
	 * @static
	 * @param	string|array	$data
	 * @param	int	$status
	 * @param	array	$headers
	 * @return Symfony\Component\HttpFoundation\JsonResponse
	 */
	 public static function json($data = array(), $status = 200, $headers = array()){
		return parent::json($data, $status, $headers);
	 }

	/**
	 * Return a new streamed response from the application.
	 *
	 * @static
	 * @param	Closure	$callback
	 * @param	int	$status
	 * @param	array	$headers
	 * @return Symfony\Component\HttpFoundation\StreamedResponse
	 */
	 public static function stream($callback, $status = 200, $headers = array()){
		return parent::stream($callback, $status, $headers);
	 }

	/**
	 * Create a new file download response.
	 *
	 * @static
	 * @param	SplFileInfo|string	$file
	 * @param	int	$status
	 * @param	array	$headers
	 * @return Symfony\Component\HttpFoundation\BinaryFileResponse
	 */
	 public static function download($file, $name = null, $headers = array()){
		return parent::download($file, $name, $headers);
	 }

 }
}

namespace  {
 class Route extends Illuminate\Routing\Router{
	/**
	 * Create a new router instance.
	 *
	 * @static
	 * @param	Illuminate\Container\Container	$container
	 */
	 public static function __construct($container = null){
		parent::__construct($container);
	 }

	/**
	 * Add a new route to the collection.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	mixed	$action
	 * @return Illuminate\Routing\Route
	 */
	 public static function get($pattern, $action){
		return parent::get($pattern, $action);
	 }

	/**
	 * Add a new route to the collection.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	mixed	$action
	 * @return Illuminate\Routing\Route
	 */
	 public static function post($pattern, $action){
		return parent::post($pattern, $action);
	 }

	/**
	 * Add a new route to the collection.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	mixed	$action
	 * @return Illuminate\Routing\Route
	 */
	 public static function put($pattern, $action){
		return parent::put($pattern, $action);
	 }

	/**
	 * Add a new route to the collection.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	mixed	$action
	 * @return Illuminate\Routing\Route
	 */
	 public static function patch($pattern, $action){
		return parent::patch($pattern, $action);
	 }

	/**
	 * Add a new route to the collection.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	mixed	$action
	 * @return Illuminate\Routing\Route
	 */
	 public static function delete($pattern, $action){
		return parent::delete($pattern, $action);
	 }

	/**
	 * Add a new route to the collection.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	mixed	$action
	 * @return Illuminate\Routing\Route
	 */
	 public static function options($pattern, $action){
		return parent::options($pattern, $action);
	 }

	/**
	 * Add a new route to the collection.
	 *
	 * @static
	 * @param	string	$method
	 * @param	string	$pattern
	 * @param	mixed	$action
	 * @return Illuminate\Routing\Route
	 */
	 public static function match($method, $pattern, $action){
		return parent::match($method, $pattern, $action);
	 }

	/**
	 * Add a new route to the collection.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	mixed	$action
	 * @return Illuminate\Routing\Route
	 */
	 public static function any($pattern, $action){
		return parent::any($pattern, $action);
	 }

	/**
	 * Register an array of controllers with wildcard routing.
	 *
	 * @static
	 * @param	array	$controllers
	 */
	 public static function controllers($controllers){
		parent::controllers($controllers);
	 }

	/**
	 * Route a controller to a URI with wildcard routing.
	 *
	 * @static
	 * @param	string	$uri
	 * @param	string	$controller
	 * @return Illuminate\Routing\Route
	 */
	 public static function controller($uri, $controller){
		return parent::controller($uri, $controller);
	 }

	/**
	 * Route a resource to a controller.
	 *
	 * @static
	 * @param	string	$resource
	 * @param	string	$controller
	 * @param	array	$options
	 */
	 public static function resource($resource, $controller, $options = array()){
		parent::resource($resource, $controller, $options);
	 }

	/**
	 * Get the base resource URI for a given resource.
	 *
	 * @static
	 * @param	string	$resource
	 * @return string
	 */
	 public static function getResourceUri($resource){
		return parent::getResourceUri($resource);
	 }

	/**
	 * Create a route group with shared attributes.
	 *
	 * @static
	 * @param	array	$attributes
	 * @param	Closure	$callback
	 */
	 public static function group($attributes, $callback){
		parent::group($attributes, $callback);
	 }

	/**
	 * Get the response for a given request.
	 *
	 * @static
	 * @param	Symfony\Component\HttpFoundation\Request	$request
	 * @return Symfony\Component\HttpFoundation\Response
	 */
	 public static function dispatch($request){
		return parent::dispatch($request);
	 }

	/**
	 * Register a "before" routing filter.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 */
	 public static function before($callback){
		parent::before($callback);
	 }

	/**
	 * Register an "after" routing filter.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 */
	 public static function after($callback){
		parent::after($callback);
	 }

	/**
	 * Register a "close" routing filter.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 */
	 public static function close($callback){
		parent::close($callback);
	 }

	/**
	 * Register a "finish" routing filters.
	 *
	 * @static
	 * @param	Closure|string	$callback
	 */
	 public static function finish($callback){
		parent::finish($callback);
	 }

	/**
	 * Register a new filter with the application.
	 *
	 * @static
	 * @param	string	$name
	 * @param	Closure|string	$callback
	 */
	 public static function addFilter($name, $callback){
		parent::addFilter($name, $callback);
	 }

	/**
	 * Get a registered filter callback.
	 *
	 * @static
	 * @param	string	$name
	 * @return Closure
	 */
	 public static function getFilter($name){
		return parent::getFilter($name);
	 }

	/**
	 * Tie a registered filter to a URI pattern.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	string|array	$names
	 */
	 public static function matchFilter($pattern, $names){
		parent::matchFilter($pattern, $names);
	 }

	/**
	 * Find the patterned filters matching a request.
	 *
	 * @static
	 * @param	Illuminate\Http\Request	$request
	 * @return array
	 */
	 public static function findPatternFilters($request){
		return parent::findPatternFilters($request);
	 }

	/**
	 * Call the "finish" global filter.
	 *
	 * @static
	 * @param	Symfony\Component\HttpFoundation\Request	$request
	 * @param	Symfony\Component\HttpFoundation\Response	$response
	 * @return mixed
	 */
	 public static function callFinishFilter($request, $response){
		return parent::callFinishFilter($request, $response);
	 }

	/**
	 * Set a global where pattern on all routes
	 *
	 * @static
	 * @param	string	$key
	 * @param	string	$pattern
	 */
	 public static function pattern($key, $pattern){
		parent::pattern($key, $pattern);
	 }

	/**
	 * Register a model binder for a wildcard.
	 *
	 * @static
	 * @param	string	$key
	 * @param	string	$class
	 */
	 public static function model($key, $class){
		parent::model($key, $class);
	 }

	/**
	 * Register a custom parameter binder.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$binder
	 */
	 public static function bind($key, $binder){
		parent::bind($key, $binder);
	 }

	/**
	 * Determine if a given key has a registered binder.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function hasBinder($key){
		return parent::hasBinder($key);
	 }

	/**
	 * Call a binder for a given wildcard.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 * @param	Illuminate\Routing\Route	$route
	 * @return mixed
	 */
	 public static function performBinding($key, $value, $route){
		return parent::performBinding($key, $value, $route);
	 }

	/**
	 * Prepare the given value as a Response object.
	 *
	 * @static
	 * @param	mixed	$value
	 * @param	Illuminate\Http\Request	$request
	 * @return Symfony\Component\HttpFoundation\Response
	 */
	 public static function prepare($value, $request){
		return parent::prepare($value, $request);
	 }

	/**
	 * Determine if the current route has a given name.
	 *
	 * @static
	 * @param	string	$name
	 * @return bool
	 */
	 public static function currentRouteNamed($name){
		return parent::currentRouteNamed($name);
	 }

	/**
	 * Determine if the current route uses a given controller action.
	 *
	 * @static
	 * @param	string	$action
	 * @return bool
	 */
	 public static function currentRouteUses($action){
		return parent::currentRouteUses($action);
	 }

	/**
	 * Determine if route filters are enabled.
	 *
	 * @static
	 * @return bool
	 */
	 public static function filtersEnabled(){
		return parent::filtersEnabled();
	 }

	/**
	 * Enable the running of filters.
	 *
	 * @static
	 */
	 public static function enableFilters(){
		parent::enableFilters();
	 }

	/**
	 * Disable the running of all filters.
	 *
	 * @static
	 */
	 public static function disableFilters(){
		parent::disableFilters();
	 }

	/**
	 * Retrieve the entire route collection.
	 *
	 * @static
	 * @return Symfony\Component\Routing\RouteCollection
	 */
	 public static function getRoutes(){
		return parent::getRoutes();
	 }

	/**
	 * Get the current request being dispatched.
	 *
	 * @static
	 * @return Symfony\Component\HttpFoundation\Request
	 */
	 public static function getRequest(){
		return parent::getRequest();
	 }

	/**
	 * Get the current route being executed.
	 *
	 * @static
	 * @return Illuminate\Routing\Route
	 */
	 public static function getCurrentRoute(){
		return parent::getCurrentRoute();
	 }

	/**
	 * Set the current route on the router.
	 *
	 * @static
	 * @param	Illuminate\Routing\Route	$route
	 */
	 public static function setCurrentRoute($route){
		parent::setCurrentRoute($route);
	 }

	/**
	 * Get the filters defined on the router.
	 *
	 * @static
	 * @return array
	 */
	 public static function getFilters(){
		return parent::getFilters();
	 }

	/**
	 * Get the global filters defined on the router.
	 *
	 * @static
	 * @return array
	 */
	 public static function getGlobalFilters(){
		return parent::getGlobalFilters();
	 }

	/**
	 * Get the controller inspector instance.
	 *
	 * @static
	 * @return Illuminate\Routing\Controllers\Inspector
	 */
	 public static function getInspector(){
		return parent::getInspector();
	 }

	/**
	 * Set the controller inspector instance.
	 *
	 * @static
	 * @param	Illuminate\Routing\Controllers\Inspector	$inspector
	 */
	 public static function setInspector($inspector){
		parent::setInspector($inspector);
	 }

	/**
	 * Get the container used by the router.
	 *
	 * @static
	 * @return Illuminate\Container\Container
	 */
	 public static function getContainer(){
		return parent::getContainer();
	 }

	/**
	 * Set the container instance on the router.
	 *
	 * @static
	 * @param	Illuminate\Container\Container	$container
	 */
	 public static function setContainer($container){
		parent::setContainer($container);
	 }

 }
}

namespace  {
 class Schema extends Illuminate\Database\Schema\Builder{
	/**
	 * Create a new database Schema manager.
	 *
	 * @static
	 * @param	Illuminate\Database\Connection	$connection
	 */
	 public static function __construct($connection){
		parent::__construct($connection);
	 }

	/**
	 * Determine if the given table exists.
	 *
	 * @static
	 * @param	string	$table
	 * @return bool
	 */
	 public static function hasTable($table){
		return parent::hasTable($table);
	 }

	/**
	 * Modify a table on the schema.
	 *
	 * @static
	 * @param	string	$table
	 * @param	Closure	$callback
	 * @return Illuminate\Database\Schema\Blueprint
	 */
	 public static function table($table, $callback){
		return parent::table($table, $callback);
	 }

	/**
	 * Create a new table on the schema.
	 *
	 * @static
	 * @param	string	$table
	 * @param	Closure	$callback
	 * @return Illuminate\Database\Schema\Blueprint
	 */
	 public static function create($table, $callback){
		return parent::create($table, $callback);
	 }

	/**
	 * Drop a table from the schema.
	 *
	 * @static
	 * @param	string	$table
	 * @return Illuminate\Database\Schema\Blueprint
	 */
	 public static function drop($table){
		return parent::drop($table);
	 }

	/**
	 * Drop a table from the schema if it exists.
	 *
	 * @static
	 * @param	string	$table
	 * @return Illuminate\Database\Schema\Blueprint
	 */
	 public static function dropIfExists($table){
		return parent::dropIfExists($table);
	 }

	/**
	 * Rename a table on the schema.
	 *
	 * @static
	 * @param	string	$from
	 * @param	string	$to
	 * @return Illuminate\Database\Schema\Blueprint
	 */
	 public static function rename($from, $to){
		return parent::rename($from, $to);
	 }

	/**
	 * Get the database connection instance.
	 *
	 * @static
	 * @return Illuminate\Database\Connection
	 */
	 public static function getConnection(){
		return parent::getConnection();
	 }

	/**
	 * Set the database connection instance.
	 *
	 * @static
	 * @param	Illuminate\Database\Connection
	 * @return Illuminate\Database\Schema\Builder
	 */
	 public static function setConnection($connection){
		return parent::setConnection($connection);
	 }

 }
}

namespace  {
 class Seeder extends Illuminate\Database\Seeder{
	/**
	 * Run the database seeds.
	 *
	 * @static
	 */
	 public static function run(){
		parent::run();
	 }

	/**
	 * Seed the given connection from the given path.
	 *
	 * @static
	 * @param	string	$class
	 */
	 public static function call($class){
		parent::call($class);
	 }

	/**
	 * Set the IoC container instance.
	 *
	 * @static
	 * @param	Illuminate\Container\Container	$container
	 */
	 public static function setContainer($container){
		parent::setContainer($container);
	 }

 }
}

namespace  {
 class Session extends Illuminate\Session\CookieStore{
	/**
	 * Create a new Cookie based session store.
	 *
	 * @static
	 * @param	Illuminate\Cookie\CookieJar	$cookies
	 * @param	string	$payload
	 */
	 public static function __construct($cookies, $payload = 'illuminate_payload'){
		parent::__construct($cookies, $payload);
	 }

	/**
	 * Retrieve a session payload from storage.
	 *
	 * @static
	 * @param	string	$id
	 * @return array|null
	 */
	 public static function retrieveSession($id){
		return parent::retrieveSession($id);
	 }

	/**
	 * Create a new session in storage.
	 *
	 * @static
	 * @param	string	$id
	 * @param	array	$session
	 * @param	Symfony\Component\HttpFoundation\Response	$response
	 */
	 public static function createSession($id, $session, $response){
		parent::createSession($id, $session, $response);
	 }

	/**
	 * Update an existing session in storage.
	 *
	 * @static
	 * @param	string	$id
	 * @param	array	$session
	 * @param	Symfony\Component\HttpFoundation\Response	$response
	 */
	 public static function updateSession($id, $session, $response){
		parent::updateSession($id, $session, $response);
	 }

	/**
	 * Set the name of the session payload cookie.
	 *
	 * @static
	 * @param	string	$name
	 */
	 public static function setPayloadName($name){
		parent::setPayloadName($name);
	 }

	/**
	 * Get the cookie jar instance.
	 *
	 * @static
	 * @return Illuminate\Cookie\CookieJar
	 */
	 public static function getCookieJar(){
		return parent::getCookieJar();
	 }

	/**
	 * Load the session for the request.
	 *
	 * @static
	 * @param	Illuminate\Cookie\CookieJar	$cookies
	 * @param	string	$name
	 */
	 public static function start($cookies, $name){
		parent::start($cookies, $name);
	 }

	/**
	 * Get the full array of session data, including flash data.
	 *
	 * @static
	 * @return array
	 */
	 public static function all(){
		return parent::all();
	 }

	/**
	 * Determine if the session contains a given item.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function has($key){
		return parent::has($key);
	 }

	/**
	 * Get the requested item from the session.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return mixed
	 */
	 public static function get($key, $default = null){
		return parent::get($key, $default);
	 }

	/**
	 * Get the request item from the flash data.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return mixed
	 */
	 public static function getFlash($key, $default = null){
		return parent::getFlash($key, $default);
	 }

	/**
	 * Determine if the old input contains an item.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function hasOldInput($key){
		return parent::hasOldInput($key);
	 }

	/**
	 * Get the requested item from the flashed input array.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$default
	 * @return mixed
	 */
	 public static function getOldInput($key = null, $default = null){
		return parent::getOldInput($key, $default);
	 }

	/**
	 * Get the CSRF token value.
	 *
	 * @static
	 * @return string
	 */
	 public static function getToken(){
		return parent::getToken();
	 }

	/**
	 * Put a key / value pair in the session.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 */
	 public static function put($key, $value){
		parent::put($key, $value);
	 }

	/**
	 * Flash a key / value pair to the session.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 */
	 public static function flash($key, $value){
		parent::flash($key, $value);
	 }

	/**
	 * Flash an input array to the session.
	 *
	 * @static
	 * @param	array	$value
	 */
	 public static function flashInput($value){
		parent::flashInput($value);
	 }

	/**
	 * Keep all of the session flash data from expiring.
	 *
	 * @static
	 */
	 public static function reflash(){
		parent::reflash();
	 }

	/**
	 * Keep a session flash item from expiring.
	 *
	 * @static
	 * @param	string|array	$keys
	 */
	 public static function keep($keys){
		parent::keep($keys);
	 }

	/**
	 * Remove an item from the session.
	 *
	 * @static
	 * @param	string	$key
	 */
	 public static function forget($key){
		parent::forget($key);
	 }

	/**
	 * Remove all of the items from the session.
	 *
	 * @static
	 */
	 public static function flush(){
		parent::flush();
	 }

	/**
	 * Generate a new session identifier.
	 *
	 * @static
	 * @return string
	 */
	 public static function regenerate(){
		return parent::regenerate();
	 }

	/**
	 * Finish the session handling for the request.
	 *
	 * @static
	 * @param	Symfony\Component\HttpFoundation\Response	$response
	 * @param	int	$lifetime
	 */
	 public static function finish($response, $lifetime){
		parent::finish($response, $lifetime);
	 }

	/**
	 * Determine if the request hits the sweeper lottery.
	 *
	 * @static
	 * @return bool
	 */
	 public static function hitsLottery(){
		return parent::hitsLottery();
	 }

	/**
	 * Write the session cookie to the response.
	 *
	 * @static
	 * @param	Illuminate\Cookie\CookieJar	$cookie
	 * @param	string	$name
	 * @param	int	$lifetime
	 * @param	string	$path
	 * @param	string	$domain
	 */
	 public static function getCookie($cookie, $name, $lifetime, $path, $domain){
		parent::getCookie($cookie, $name, $lifetime, $path, $domain);
	 }

	/**
	 * Get the session payload.
	 *
	 * @static
	 */
	 public static function getSession(){
		parent::getSession();
	 }

	/**
	 * Set the entire session payload.
	 *
	 * @static
	 * @param	array	$session
	 */
	 public static function setSession($session){
		parent::setSession($session);
	 }

	/**
	 * Get the current session ID.
	 *
	 * @static
	 * @return string
	 */
	 public static function getSessionID(){
		return parent::getSessionID();
	 }

	/**
	 * Get the session's last activity UNIX timestamp.
	 *
	 * @static
	 * @return int
	 */
	 public static function getLastActivity(){
		return parent::getLastActivity();
	 }

	/**
	 * Determine if the session exists in storage.
	 *
	 * @static
	 * @return bool
	 */
	 public static function sessionExists(){
		return parent::sessionExists();
	 }

	/**
	 * Set the existence of the session.
	 *
	 * @static
	 * @param	bool	$value
	 */
	 public static function setExists($value){
		parent::setExists($value);
	 }

	/**
	 * Set the session cookie name.
	 *
	 * @static
	 * @param	string	$name
	 */
	 public static function setCookieName($name){
		parent::setCookieName($name);
	 }

	/**
	 * Get the given cookie option.
	 *
	 * @static
	 * @param	string	$option
	 * @return mixed
	 */
	 public static function getCookieOption($option){
		return parent::getCookieOption($option);
	 }

	/**
	 * Set the given cookie option.
	 *
	 * @static
	 * @param	string	$option
	 * @param	mixed	$value
	 */
	 public static function setCookieOption($option, $value){
		parent::setCookieOption($option, $value);
	 }

	/**
	 * Set the session lifetime.
	 *
	 * @static
	 * @param	int	$minutes
	 */
	 public static function setLifetime($minutes){
		parent::setLifetime($minutes);
	 }

	/**
	 * Set the chances of hitting the Sweeper lottery.
	 *
	 * @static
	 * @param	array	$values
	 */
	 public static function setSweepLottery($values){
		parent::setSweepLottery($values);
	 }

	/**
	 * Determine if the given offset exists.
	 *
	 * @static
	 * @param	string	$key
	 * @return bool
	 */
	 public static function offsetExists($key){
		return parent::offsetExists($key);
	 }

	/**
	 * Get the value at a given offset.
	 *
	 * @static
	 * @param	string	$key
	 * @return mixed
	 */
	 public static function offsetGet($key){
		return parent::offsetGet($key);
	 }

	/**
	 * Store a value at the given offset.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 */
	 public static function offsetSet($key, $value){
		parent::offsetSet($key, $value);
	 }

	/**
	 * Remove the value at a given offset.
	 *
	 * @static
	 * @param	string	$key
	 */
	 public static function offsetUnset($key){
		parent::offsetUnset($key);
	 }

 }
}

namespace  {
 class Str extends LaravelBook\Laravel4Powerpack\Str{
	/**
	 * Get the length of a string.
	 * 
	 * <code>
	 * // Get the length of a string
	 * $length = Str::length('Taylor Otwell');
	 * 
	 * // Get the length of a multi-byte string
	 * $length = Str::length('Τάχιστη')
	 * </code>
	 *
	 * @static
	 * @param	string	$value
	 * @return int
	 */
	 public static function length($string){
		return parent::length($string);
	 }

	/**
	 * Convert a string to lowercase.
	 * 
	 * <code>
	 * // Convert a string to lowercase
	 * $lower = Str::lower('Taylor Otwell');
	 * 
	 * // Convert a multi-byte string to lowercase
	 * $lower = Str::lower('Τάχιστη');
	 * </code>
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function lower($string){
		return parent::lower($string);
	 }

	/**
	 * Convert a string to uppercase.
	 * 
	 * <code>
	 * // Convert a string to uppercase
	 * $upper = Str::upper('Taylor Otwell');
	 * 
	 * // Convert a multi-byte string to uppercase
	 * $upper = Str::upper('Τάχιστη');
	 * </code>
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function upper($string){
		return parent::upper($string);
	 }

	/**
	 * Convert first letter of each word to uppercase.
	 *
	 * @static
	 * @param	string	$string
	 * @return string
	 */
	 public static function upperWords($string){
		return parent::upperWords($string);
	 }

	/**
	 * Convert a string to title case (ucwords equivalent).
	 * 
	 * <code>
	 * // Convert a string to title case
	 * $title = Str::title('taylor otwell');
	 * 
	 * // Convert a multi-byte string to title case
	 * $title = Str::title('νωθρού κυνός');
	 * </code>
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function title($string){
		return parent::title($string);
	 }

	/**
	 * Limit the number of characters in a string.
	 * 
	 * <code>
	 * // Returns "Tay..."
	 * echo Str::limit('Taylor Otwell', 3);
	 * 
	 * // Limit the number of characters and append a custom ending
	 * echo Str::limit('Taylor Otwell', 3, '---');
	 * </code>
	 *
	 * @static
	 * @param	string	$value
	 * @param	int	$limit
	 * @param	string	$end
	 * @return string
	 */
	 public static function limit($value, $limit = 100, $end = '...'){
		return parent::limit($value, $limit, $end);
	 }

	/**
	 * Limit the number of chracters in a string including custom ending
	 * 
	 * <code>
	 * // Returns "Taylor..."
	 * echo Str::limitExact('Taylor Otwell', 9);
	 * 
	 * // Limit the number of characters and append a custom ending
	 * echo Str::limitExact('Taylor Otwell', 9, '---');
	 * </code>
	 *
	 * @static
	 * @param	string	$value
	 * @param	int	$limit
	 * @param	string	$end
	 * @return string
	 */
	 public static function limitExact($value, $limit = 100, $end = '...'){
		return parent::limitExact($value, $limit, $end);
	 }

	/**
	 * Limit the number of words in a string.
	 * 
	 * <code>
	 * // Returns "This is a..."
	 * echo Str::words('This is a sentence.', 3);
	 * 
	 * // Limit the number of words and append a custom ending
	 * echo Str::words('This is a sentence.', 3, '---');
	 * </code>
	 *
	 * @static
	 * @param	string	$value
	 * @param	int	$words
	 * @param	string	$end
	 * @return string
	 */
	 public static function words($value, $words = 100, $end = '...'){
		return parent::words($value, $words, $end);
	 }

	/**
	 * Adds a space to a string after a given amount of contiguous, non-whitespace characters.
	 *
	 * @static
	 * @param	string	$string
	 * @return string
	 */
	 public static function wordwrap($string, $length){
		return parent::wordwrap($string, $length);
	 }

	/**
	 * Get the singular form of the given word.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function singular($value){
		return parent::singular($value);
	 }

	/**
	 * Get the plural form of the given word.
	 * 
	 * <code>
	 * // Returns the plural form of "child"
	 * $plural = Str::plural('child', 10);
	 * 
	 * // Returns the singular form of "octocat" since count is one
	 * $plural = Str::plural('octocat', 1);
	 * </code>
	 *
	 * @static
	 * @param	string	$value
	 * @param	int	$count
	 * @return string
	 */
	 public static function plural($value, $count = 2){
		return parent::plural($value, $count);
	 }

	/**
	 * Get a files extension from its path.
	 *
	 * @static
	 * @param	string	$string
	 * @return string $string
	 */
	 public static function extension($fileName){
		return parent::extension($fileName);
	 }

	/**
	 * Generate a URL friendly "slug" from a given string.
	 * 
	 * <code>
	 * // Returns "this-is-my-blog-post"
	 * $slug = Str::slug('This is my blog post!');
	 * 
	 * // Returns "this_is_my_blog_post"
	 * $slug = Str::slug('This is my blog post!', '_');
	 * </code>
	 *
	 * @static
	 * @param	string	$title
	 * @param	string	$separator
	 * @return string
	 */
	 public static function slug($title, $separator = '-', $keepExtension = false){
		return parent::slug($title, $separator, $keepExtension);
	 }

	/**
	 * Convert a string to 7-bit ASCII.
	 * 
	 * This is helpful for converting UTF-8 strings for usage in URLs, etc.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function ascii($value){
		return parent::ascii($value);
	 }

	/**
	 * Convert a string to an underscored, camel-cased class name.
	 * 
	 * This method is primarily used to format task and controller names.
	 * 
	 * <code>
	 * // Returns "Task_Name"
	 * $class = Str::classify('task_name');
	 * 
	 * // Returns "Taylor_Otwell"
	 * $class = Str::classify('taylor otwell')
	 * </code>
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function classify($value){
		return parent::classify($value);
	 }

	/**
	 * Convert a value to camel case.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function camelCase($value){
		return parent::camelCase($value);
	 }

	/**
	 * Return the "URI" style segments in a given string.
	 *
	 * @static
	 * @param	string	$value
	 * @return array
	 */
	 public static function segments($value){
		return parent::segments($value);
	 }

	/**
	 * Generate a random alpha or alpha-numeric string.
	 * 
	 * <code>
	 * // Generate a 40 character random alpha-numeric string
	 * echo Str::random(40);
	 * 
	 * // Generate a 16 character random alphabetic string
	 * echo Str::random(16, 'alpha');
	 * <code>
	 *
	 * @static
	 * @param	int	$length
	 * @param	string	$type
	 * @return string
	 */
	 public static function random($length, $type = 'alnum'){
		return parent::random($length, $type);
	 }

	/**
	 * Determine if a given string matches a given pattern.
	 *
	 * @static
	 * @param	string	$pattern
	 * @param	string	$value
	 * @return bool
	 */
	 public static function is($pattern, $value){
		return parent::is($pattern, $value);
	 }

	/**
	 * Determine if a given string ends with a given needle.
	 *
	 * @static
	 * @param	string	$haystack
	 * @param	string	$needle
	 * @return bool
	 */
	 public static function endsWith($haystack, $needle){
		return parent::endsWith($haystack, $needle);
	 }

	/**
	 * Determine if a string starts with a given needle.
	 *
	 * @static
	 * @param	string	$haystack
	 * @param	string	$needle
	 * @return bool
	 */
	 public static function startsWith($haystack, $needle){
		return parent::startsWith($haystack, $needle);
	 }

	/**
	 * Determine if a given string contains a given sub-string.
	 *
	 * @static
	 * @param	string	$haystack
	 * @param	string|array $needle
	 * @return bool
	 */
	 public static function contains($haystack, $needle){
		return parent::contains($haystack, $needle);
	 }

	/**
	 * Cap a string with a single instance of a given value.
	 *
	 * @static
	 * @param	string	$value
	 * @param	string	$cap
	 * @return string
	 */
	 public static function finish($value, $cap){
		return parent::finish($value, $cap);
	 }

	/**
	 * Convert a value to camel case.
	 *
	 * @static
	 * @param	string	$value
	 * @return string
	 */
	 public static function camel($value){
		return parent::camel($value);
	 }

	/**
	 * Generate a "random" alpha-numeric string.
	 * 
	 * Should not be considered sufficient for cryptography, etc.
	 *
	 * @static
	 * @param	int	$length
	 * @return string
	 */
	 public static function quickRandom($length = 16){
		return parent::quickRandom($length);
	 }

	/**
	 * Convert a string to snake case.
	 *
	 * @static
	 * @param	string	$value
	 * @param	string	$delimiter
	 * @return string
	 */
	 public static function snake($value, $delimiter = '_'){
		return parent::snake($value, $delimiter);
	 }

 }
}

namespace  {
 class URL extends Illuminate\Routing\UrlGenerator{
	/**
	 * Create a new URL Generator instance.
	 *
	 * @static
	 * @param	Symfony\Component\Routing\RouteCollection	$routes
	 * @param	Symfony\Component\HttpFoundation\Request	$request
	 */
	 public static function __construct($routes, $request){
		parent::__construct($routes, $request);
	 }

	/**
	 * Get the current URL for the request.
	 *
	 * @static
	 * @return string
	 */
	 public static function current(){
		return parent::current();
	 }

	/**
	 * Get the URL for the previous request.
	 *
	 * @static
	 * @return string
	 */
	 public static function previous(){
		return parent::previous();
	 }

	/**
	 * Generate a absolute URL to the given path.
	 *
	 * @static
	 * @param	string	$path
	 * @param	mixed	$parameters
	 * @param	bool	$secure
	 * @return string
	 */
	 public static function to($path, $parameters = array(), $secure = null){
		return parent::to($path, $parameters, $secure);
	 }

	/**
	 * Generate a secure, absolute URL to the given path.
	 *
	 * @static
	 * @param	string	$path
	 * @param	array	$parameters
	 * @return string
	 */
	 public static function secure($path, $parameters = array()){
		return parent::secure($path, $parameters);
	 }

	/**
	 * Generate a URL to an application asset.
	 *
	 * @static
	 * @param	string	$path
	 * @param	bool	$secure
	 * @return string
	 */
	 public static function asset($path, $secure = null){
		return parent::asset($path, $secure);
	 }

	/**
	 * Generate a URL to a secure asset.
	 *
	 * @static
	 * @param	string	$path
	 * @return string
	 */
	 public static function secureAsset($path){
		return parent::secureAsset($path);
	 }

	/**
	 * Get the URL to a named route.
	 *
	 * @static
	 * @param	string	$name
	 * @param	mixed	$parameters
	 * @param	bool	$absolute
	 * @return string
	 */
	 public static function route($name, $parameters = array(), $absolute = true){
		return parent::route($name, $parameters, $absolute);
	 }

	/**
	 * Get the URL to a controller action.
	 *
	 * @static
	 * @param	string	$action
	 * @param	mixed	$parameters
	 * @param	bool	$absolute
	 * @return string
	 */
	 public static function action($action, $parameters = array(), $absolute = true){
		return parent::action($action, $parameters, $absolute);
	 }

	/**
	 * Determine if the given path is a valid URL.
	 *
	 * @static
	 * @param	string	$path
	 * @return bool
	 */
	 public static function isValidUrl($path){
		return parent::isValidUrl($path);
	 }

	/**
	 * Get the request instance.
	 *
	 * @static
	 * @return Symfony\Component\HttpFoundation\Request
	 */
	 public static function getRequest(){
		return parent::getRequest();
	 }

	/**
	 * Set the current request instance.
	 *
	 * @static
	 * @param	Symfony\Component\HttpFoundation\Request	$request
	 */
	 public static function setRequest($request){
		parent::setRequest($request);
	 }

	/**
	 * Get the Symfony URL generator instance.
	 *
	 * @static
	 * @return Symfony\Component\Routing\Generator\UrlGenerator
	 */
	 public static function getGenerator(){
		return parent::getGenerator();
	 }

	/**
	 * Get the Symfony URL generator instance.
	 *
	 * @static
	 * @param	Symfony\Component\Routing\Generator\UrlGenerator	$generator
	 */
	 public static function setGenerator($generator){
		parent::setGenerator($generator);
	 }

 }
}

namespace  {
 class Validator extends Illuminate\Validation\Factory{
	/**
	 * Create a new Validator factory instance.
	 *
	 * @static
	 * @param	Symfony\Component\Translation\TranslatorInterface	$translator
	 */
	 public static function __construct($translator){
		parent::__construct($translator);
	 }

	/**
	 * Create a new Validator instance.
	 *
	 * @static
	 * @param	array	$data
	 * @param	array	$rules
	 * @param	array	$messages
	 * @return Illuminate\Validation\Validator
	 */
	 public static function make($data, $rules, $messages = array()){
		return parent::make($data, $rules, $messages);
	 }

	/**
	 * Register a custom validator extension.
	 *
	 * @static
	 * @param	string	$rule
	 * @param	Closure	$extension
	 */
	 public static function extend($rule, $extension){
		parent::extend($rule, $extension);
	 }

	/**
	 * Register a custom implicit validator extension.
	 *
	 * @static
	 * @param	string	$rule
	 * @param	Closure $extension
	 */
	 public static function extendImplicit($rule, $extension){
		parent::extendImplicit($rule, $extension);
	 }

	/**
	 * Set the Validator instance resolver.
	 *
	 * @static
	 * @param	Closure	$resolver
	 */
	 public static function resolver($resolver){
		parent::resolver($resolver);
	 }

	/**
	 * Get the Translator implementation.
	 *
	 * @static
	 * @return Symfony\Component\Translation\TranslatorInterface
	 */
	 public static function getTranslator(){
		return parent::getTranslator();
	 }

	/**
	 * Get the Presence Verifier implementation.
	 *
	 * @static
	 * @return Illuminate\Validation\PresenceVerifierInterface
	 */
	 public static function getPresenceVerifier(){
		return parent::getPresenceVerifier();
	 }

	/**
	 * Set the Presence Verifier implementation.
	 *
	 * @static
	 * @param	Illuminate\Validation\PresenceVerifierInterface	$presenceVerifier
	 */
	 public static function setPresenceVerifier($presenceVerifier){
		parent::setPresenceVerifier($presenceVerifier);
	 }

 }
}

namespace  {
 class View extends Illuminate\View\Environment{
	/**
	 * Create a new view environment instance.
	 *
	 * @static
	 * @param	Illuminate\View\Engines\EngineResolver	$engines
	 * @param	Illuminate\View\ViewFinderInterface	$finder
	 * @param	Illuminate\Events\Dispatcher	$events
	 */
	 public static function __construct($engines, $finder, $events){
		parent::__construct($engines, $finder, $events);
	 }

	/**
	 * Get a evaluated view contents for the given view.
	 *
	 * @static
	 * @param	string	$view
	 * @param	mixed	$data
	 * @return Illuminate\View\View
	 */
	 public static function make($view, $data = array()){
		return parent::make($view, $data);
	 }

	/**
	 * Determine if a given view exists.
	 *
	 * @static
	 * @param	string	$view
	 * @return bool
	 */
	 public static function exists($view){
		return parent::exists($view);
	 }

	/**
	 * Get the rendered contents of a partial from a loop.
	 *
	 * @static
	 * @param	string	$view
	 * @param	array	$data
	 * @param	string	$iterator
	 * @param	string	$empty
	 * @return string
	 */
	 public static function renderEach($view, $data, $iterator, $empty = 'raw|'){
		return parent::renderEach($view, $data, $iterator, $empty);
	 }

	/**
	 * Add a piece of shared data to the environment.
	 *
	 * @static
	 * @param	string	$key
	 * @param	mixed	$value
	 */
	 public static function share($key, $value){
		parent::share($key, $value);
	 }

	/**
	 * Register a view composer event.
	 *
	 * @static
	 * @param	array|string	$views
	 * @param	Closure|string	$callback
	 * @return Closure
	 */
	 public static function composer($views, $callback){
		return parent::composer($views, $callback);
	 }

	/**
	 * Call the composer for a given view.
	 *
	 * @static
	 * @param	Illuminate\View\View	$view
	 */
	 public static function callComposer($view){
		parent::callComposer($view);
	 }

	/**
	 * Start injecting content into a section.
	 *
	 * @static
	 * @param	string	$section
	 * @param	string	$content
	 */
	 public static function startSection($section, $content = ''){
		parent::startSection($section, $content);
	 }

	/**
	 * Inject inline content into a section.
	 *
	 * @static
	 * @param	string	$section
	 * @param	string	$content
	 */
	 public static function inject($section, $content){
		parent::inject($section, $content);
	 }

	/**
	 * Stop injecting content into a section and return its contents.
	 *
	 * @static
	 * @return string
	 */
	 public static function yieldSection(){
		return parent::yieldSection();
	 }

	/**
	 * Stop injecting content into a section.
	 *
	 * @static
	 * @return string
	 */
	 public static function stopSection(){
		return parent::stopSection();
	 }

	/**
	 * Get the string contents of a section.
	 *
	 * @static
	 * @param	string	$section
	 * @return string
	 */
	 public static function yieldContent($section){
		return parent::yieldContent($section);
	 }

	/**
	 * Flush all of the section contents.
	 *
	 * @static
	 */
	 public static function flushSections(){
		parent::flushSections();
	 }

	/**
	 * Increment the rendering counter.
	 *
	 * @static
	 */
	 public static function incrementRender(){
		parent::incrementRender();
	 }

	/**
	 * Decrement the rendering counter.
	 *
	 * @static
	 */
	 public static function decrementRender(){
		parent::decrementRender();
	 }

	/**
	 * Check if there are no active render operations.
	 *
	 * @static
	 * @return bool
	 */
	 public static function doneRendering(){
		return parent::doneRendering();
	 }

	/**
	 * Add a location to the array of view locations.
	 *
	 * @static
	 * @param	string	$location
	 */
	 public static function addLocation($location){
		parent::addLocation($location);
	 }

	/**
	 * Add a new namespace to the loader.
	 *
	 * @static
	 * @param	string	$namespace
	 * @param	string|array	$hints
	 */
	 public static function addNamespace($namespace, $hints){
		parent::addNamespace($namespace, $hints);
	 }

	/**
	 * Register a valid view extension and its engine.
	 *
	 * @static
	 * @param	string	$extension
	 * @param	string	$engine
	 * @param	Closure	$resolver
	 */
	 public static function addExtension($extension, $engine, $resolver = null){
		parent::addExtension($extension, $engine, $resolver);
	 }

	/**
	 * Get the extension to engine bindings.
	 *
	 * @static
	 * @return array
	 */
	 public static function getExtensions(){
		return parent::getExtensions();
	 }

	/**
	 * Get the engine resolver instance.
	 *
	 * @static
	 * @return Illuminate\View\Engines\EngineResolver
	 */
	 public static function getEngineResolver(){
		return parent::getEngineResolver();
	 }

	/**
	 * Get the view finder instance.
	 *
	 * @static
	 * @return Illuminate\View\ViewFinderInterface
	 */
	 public static function getFinder(){
		return parent::getFinder();
	 }

	/**
	 * Get the event dispatcher instance.
	 *
	 * @static
	 * @return Illuminate\Events\Dispatcher
	 */
	 public static function getDispatcher(){
		return parent::getDispatcher();
	 }

	/**
	 * Get the IoC container instance.
	 *
	 * @static
	 * @return Illuminate\Container\Container
	 */
	 public static function getContainer(){
		return parent::getContainer();
	 }

	/**
	 * Set the IoC container instance.
	 *
	 * @static
	 * @param	Illuminate\Container\Container	$container
	 */
	 public static function setContainer($container){
		parent::setContainer($container);
	 }

	/**
	 * Get all of the shared data for the environment.
	 *
	 * @static
	 * @return array
	 */
	 public static function getShared(){
		return parent::getShared();
	 }

	/**
	 * Get the entire array of sections.
	 *
	 * @static
	 * @return array
	 */
	 public static function getSections(){
		return parent::getSections();
	 }

 }
}

namespace  {
 class Alert extends Bootstrapper\Alert{
	/**
	 * Writes the current Alert
	 *
	 * @static
	 * @return string A Bootstrap Alert
	 */
	 public static function render(){
		return parent::render();
	 }

	/**
	 * Check to see if we're calling an informative alert
	 *
	 * @static
	 * @param	string $method	The function called
	 * @param	array	$parameters Its parameters

	 * @return Alert
	 */
	 public static function __callStatic($method, $parameters){
		return parent::__callStatic($method, $parameters);
	 }

	/**
	 * Force the alert to be open
	 *
	 * @static
	 * @param	bool $closeable If the alert should be closeable or not

	 * @return Alert
	 */
	 public static function open($closeable = false){
		return parent::open($closeable);
	 }

	/**
	 * Make the alert block
	 *
	 * @static
	 * @param	bool $block If the alert should be block or not

	 * @return Alert
	 */
	 public static function block($block = true){
		return parent::block($block);
	 }

	/**
	 * Create a new Success Alert.
	 *
	 * @static
	 * @param	string $message	Message in alert
	 * @param	array	$attributes Parent div attributes

	 * @return string Alert HTML
	 */
	 public static function success($message, $attributes = array()){
		return parent::success($message, $attributes);
	 }

	/**
	 * Create a new Info Alert.
	 *
	 * @static
	 * @param	string $message	Message in alert
	 * @param	array	$attributes Parent div attributes

	 * @return string Alert HTML
	 */
	 public static function info($message, $attributes = array()){
		return parent::info($message, $attributes);
	 }

	/**
	 * Create a new Warning Alert.
	 *
	 * @static
	 * @param	string $message	Message in alert
	 * @param	array	$attributes Parent div attributes

	 * @return string Alert HTML
	 */
	 public static function warning($message, $attributes = array()){
		return parent::warning($message, $attributes);
	 }

	/**
	 * Create a new Error Alert.
	 *
	 * @static
	 * @param	string $message	Message in alert
	 * @param	array	$attributes Parent div attributes

	 * @return string Alert HTML
	 */
	 public static function error($message, $attributes = array()){
		return parent::error($message, $attributes);
	 }

	/**
	 * Create a new Danger Alert.
	 *
	 * @static
	 * @param	string $message	Message in alert
	 * @param	array	$attributes Parent div attributes

	 * @return string Alert HTML
	 */
	 public static function danger($message, $attributes = array()){
		return parent::danger($message, $attributes);
	 }

	/**
	 * Create a new custom Alert.
	 * This assumes you have created the appropriate css class for the alert type.
	 *
	 * @static
	 * @param	string $type	Type of alert
	 * @param	string $message	Message in alert
	 * @param	array	$attributes Parent div attributes

	 * @return string Alert HTML
	 */
	 public static function custom($type, $message, $attributes = array()){
		return parent::custom($type, $message, $attributes);
	 }

	/**
	 * Creates a basic Element
	 *
	 * @static
	 * @param	string $element
	 * @param	string $value
	 * @param	array	$attributes

	 * @return Element
	 */
	 public static function __construct($element = null, $value = null, $attributes = array()){
		return parent::__construct($element, $value, $attributes);
	 }

	/**
	 * Static alias for constructor
	 *
	 * @static
	 * @param	string	$element
	 * @param	string|null|Tag $value
	 * @param	array	$attributes
	 * @return Element
	 */
	 public static function create($element = null, $value = null, $attributes = array()){
		return parent::create($element, $value, $attributes);
	 }

	/**
	 * Wrap the Element in another element
	 *
	 * @static
	 * @param	string|Element $element The element's tag

	 * @return Element
	 */
	 public static function wrapWith($element, $name = null){
		return parent::wrapWith($element, $name);
	 }

	/**
	 * Render on string conversion
	 *
	 * @static
	 * @return string
	 */
	 public static function __toString(){
		return parent::__toString();
	 }

	/**
	 * Open the tag tree on a particular child
	 *
	 * @static
	 * @param	string $onChild The child's key

	 * @return string
	 */
	 public static function openOn($onChildren){
		return parent::openOn($onChildren);
	 }

	/**
	 * Check if the tag is opened
	 *
	 * @static
	 * @return boolean
	 */
	 public static function isOpened(){
		return parent::isOpened();
	 }

	/**
	 * Returns the Tag's content
	 *
	 * @static
	 * @return string
	 */
	 public static function getContent(){
		return parent::getContent();
	 }

	/**
	 * Close the Tag
	 *
	 * @static
	 * @return string
	 */
	 public static function close(){
		return parent::close();
	 }

	/**
	 * Dynamically set attributes
	 *
	 * @static
	 * @param	string $method	An attribute
	 * @param	array	$parameters Its value(s)
	 */
	 public static function __call($method, $parameters){
		parent::__call($method, $parameters);
	 }

	/**
	 * Dynamically set an attribute
	 *
	 * @static
	 * @param	string $attribute The attribute
	 * @param	string $value	Its value
	 */
	 public static function __set($attribute, $value){
		parent::__set($attribute, $value);
	 }

	/**
	 * Get an attribute or a child
	 *
	 * @static
	 * @param	string $item The desired child/attribute

	 * @return mixed
	 */
	 public static function __get($item){
		return parent::__get($item);
	 }

	/**
	 * Changes the Tag's element
	 *
	 * @static
	 * @param	string $element
	 */
	 public static function setElement($element){
		parent::setElement($element);
	 }

	/**
	 * Change the object's value
	 *
	 * @static
	 * @param	string $value
	 */
	 public static function setValue($value){
		parent::setValue($value);
	 }

	/**
	 * Wrap the value in a tag
	 *
	 * @static
	 * @param	string $tag The tag
	 */
	 public static function wrapValue($tag){
		parent::wrapValue($tag);
	 }

	/**
	 * Get the value
	 *
	 * @static
	 * @return string
	 */
	 public static function getValue(){
		return parent::getValue();
	 }

	/**
	 * Set an attribute
	 *
	 * @static
	 * @param	string $attribute An attribute
	 * @param	string $value	Its value
	 */
	 public static function setAttribute($attribute, $value = null){
		parent::setAttribute($attribute, $value);
	 }

	/**
	 * Set a bunch of parameters at once
	 *
	 * @static
	 * @param	array $attributes The attributes to add to the existing ones

	 * @return Tag
	 */
	 public static function setAttributes($attributes){
		return parent::setAttributes($attributes);
	 }

	/**
	 * Get all attributes
	 *
	 * @static
	 * @return array
	 */
	 public static function getAttributes(){
		return parent::getAttributes();
	 }

	/**
	 * Replace all attributes with the provided array
	 *
	 * @static
	 * @param	array $attributes The attributes to replace with

	 * @return Tag
	 */
	 public static function replaceAttributes($attributes){
		return parent::replaceAttributes($attributes);
	 }

	/**
	 * Add one or more classes to the current field
	 *
	 * @static
	 * @param	string $class The class(es) to add
	 */
	 public static function addClass($class){
		parent::addClass($class);
	 }

	/**
	 * Remove one or more classes to the current field
	 *
	 * @static
	 * @param	string $class The class(es) to remove
	 */
	 public static function removeClass($class){
		parent::removeClass($class);
	 }

	/**
	 * Get the Element's parent
	 *
	 * @static
	 * @param	integer $levels The number of levels to go back up

	 * @return Element
	 */
	 public static function getParent($levels = null){
		return parent::getParent($levels);
	 }

	/**
	 * Set the parent of the element
	 *
	 * @static
	 * @param	TreeObject $parent

	 * @return TreeObject
	 */
	 public static function setParent($parent){
		return parent::setParent($parent);
	 }

	/**
	 * Check if an object has a parent
	 *
	 * @static
	 * @return boolean
	 */
	 public static function hasParent(){
		return parent::hasParent();
	 }

	/**
	 * Get a specific child of the element
	 *
	 * @static
	 * @param	string $name The Element's name

	 * @return Element
	 */
	 public static function getChild($name){
		return parent::getChild($name);
	 }

	/**
	 * Get all children
	 *
	 * @static
	 * @return array
	 */
	 public static function getChildren(){
		return parent::getChildren();
	 }

	/**
	 * Check if the object has children
	 *
	 * @static
	 * @return boolean
	 */
	 public static function hasChildren(){
		return parent::hasChildren();
	 }

	/**
	 * Check if a given element is after another sibling
	 *
	 * @static
	 * @param	integer|string $sibling The sibling

	 * @return boolean
	 */
	 public static function isAfter($sibling){
		return parent::isAfter($sibling);
	 }

	/**
	 * Nests an object withing the current object
	 *
	 * @static
	 * @param	Tag|string $element	An element name or an Tag
	 * @param	string	$value	The Tag's alias or the element's content
	 * @param	array	$attributes

	 * @return Tag
	 */
	 public static function nest($element, $value = null, $attributes = array()){
		return parent::nest($element, $value, $attributes);
	 }

	/**
	 * Nest an array of objects/values
	 *
	 * @static
	 * @param	array $children
	 */
	 public static function nestChildren($children){
		parent::nestChildren($children);
	 }

	/**
	 * Add an object to the current object
	 *
	 * @static
	 * @param	string|TreeObject	$child The child
	 * @param	string	$name	Its name

	 * @return TreeObject
	 */
	 public static function setChild($child, $name = null){
		return parent::setChild($child, $name);
	 }

 }
}

namespace  {
 class Badge extends Bootstrapper\Badge{
	/**
	 * Create a custom label (this is here for backward compatibility)
	 *
	 * @static
	 * @param	string $type	The label type
	 * @param	string $message	The content
	 * @param	array	$attributes The attributes

	 * @return Label
	 */
	 public static function custom($type, $message, $attributes){
		return parent::custom($type, $message, $attributes);
	 }

	/**
	 * Dynamically create labels
	 *
	 * @static
	 */
	 public static function __callStatic($method, $parameters){
		parent::__callStatic($method, $parameters);
	 }

	/**
	 * Creates a basic Element
	 *
	 * @static
	 * @param	string $element
	 * @param	string $value
	 * @param	array	$attributes

	 * @return Element
	 */
	 public static function __construct($element = null, $value = null, $attributes = array()){
		return parent::__construct($element, $value, $attributes);
	 }

	/**
	 * Static alias for constructor
	 *
	 * @static
	 * @param	string	$element
	 * @param	string|null|Tag $value
	 * @param	array	$attributes
	 * @return Element
	 */
	 public static function create($element = null, $value = null, $attributes = array()){
		return parent::create($element, $value, $attributes);
	 }

	/**
	 * Wrap the Element in another element
	 *
	 * @static
	 * @param	string|Element $element The element's tag

	 * @return Element
	 */
	 public static function wrapWith($element, $name = null){
		return parent::wrapWith($element, $name);
	 }

	/**
	 * Render on string conversion
	 *
	 * @static
	 * @return string
	 */
	 public static function __toString(){
		return parent::__toString();
	 }

	/**
	 * Opens the Tag
	 *
	 * @static
	 * @return string
	 */
	 public static function open(){
		return parent::open();
	 }

	/**
	 * Open the tag tree on a particular child
	 *
	 * @static
	 * @param	string $onChild The child's key

	 * @return string
	 */
	 public static function openOn($onChildren){
		return parent::openOn($onChildren);
	 }

	/**
	 * Check if the tag is opened
	 *
	 * @static
	 * @return boolean
	 */
	 public static function isOpened(){
		return parent::isOpened();
	 }

	/**
	 * Returns the Tag's content
	 *
	 * @static
	 * @return string
	 */
	 public static function getContent(){
		return parent::getContent();
	 }

	/**
	 * Close the Tag
	 *
	 * @static
	 * @return string
	 */
	 public static function close(){
		return parent::close();
	 }

	/**
	 * Default rendering method
	 *
	 * @static
	 * @return string
	 */
	 public static function render(){
		return parent::render();
	 }

	/**
	 * Dynamically set attributes
	 *
	 * @static
	 * @param	string $method	An attribute
	 * @param	array	$parameters Its value(s)
	 */
	 public static function __call($method, $parameters){
		parent::__call($method, $parameters);
	 }

	/**
	 * Dynamically set an attribute
	 *
	 * @static
	 * @param	string $attribute The attribute
	 * @param	string $value	Its value
	 */
	 public static function __set($attribute, $value){
		parent::__set($attribute, $value);
	 }

	/**
	 * Get an attribute or a child
	 *
	 * @static
	 * @param	string $item The desired child/attribute

	 * @return mixed
	 */
	 public static function __get($item){
		return parent::__get($item);
	 }

	/**
	 * Changes the Tag's element
	 *
	 * @static
	 * @param	string $element
	 */
	 public static function setElement($element){
		parent::setElement($element);
	 }

	/**
	 * Change the object's value
	 *
	 * @static
	 * @param	string $value
	 */
	 public static function setValue($value){
		parent::setValue($value);
	 }

	/**
	 * Wrap the value in a tag
	 *
	 * @static
	 * @param	string $tag The tag
	 */
	 public static function wrapValue($tag){
		parent::wrapValue($tag);
	 }

	/**
	 * Get the value
	 *
	 * @static
	 * @return string
	 */
	 public static function getValue(){
		return parent::getValue();
	 }

	/**
	 * Set an attribute
	 *
	 * @static
	 * @param	string $attribute An attribute
	 * @param	string $value	Its value
	 */
	 public static function setAttribute($attribute, $value = null){
		parent::setAttribute($attribute, $value);
	 }

	/**
	 * Set a bunch of parameters at once
	 *
	 * @static
	 * @param	array $attributes The attributes to add to the existing ones

	 * @return Tag
	 */
	 public static function setAttributes($attributes){
		return parent::setAttributes($attributes);
	 }

	/**
	 * Get all attributes
	 *
	 * @static
	 * @return array
	 */
	 public static function getAttributes(){
		return parent::getAttributes();
	 }

	/**
	 * Replace all attributes with the provided array
	 *
	 * @static
	 * @param	array $attributes The attributes to replace with

	 * @return Tag
	 */
	 public static function replaceAttributes($attributes){
		return parent::replaceAttributes($attributes);
	 }

	/**
	 * Add one or more classes to the current field
	 *
	 * @static
	 * @param	string $class The class(es) to add
	 */
	 public static function addClass($class){
		parent::addClass($class);
	 }

	/**
	 * Remove one or more classes to the current field
	 *
	 * @static
	 * @param	string $class The class(es) to remove
	 */
	 public static function removeClass($class){
		parent::removeClass($class);
	 }

	/**
	 * Get the Element's parent
	 *
	 * @static
	 * @param	integer $levels The number of levels to go back up

	 * @return Element
	 */
	 public static function getParent($levels = null){
		return parent::getParent($levels);
	 }

	/**
	 * Set the parent of the element
	 *
	 * @static
	 * @param	TreeObject $parent

	 * @return TreeObject
	 */
	 public static function setParent($parent){
		return parent::setParent($parent);
	 }

	/**
	 * Check if an object has a parent
	 *
	 * @static
	 * @return boolean
	 */
	 public static function hasParent(){
		return parent::hasParent();
	 }

	/**
	 * Get a specific child of the element
	 *
	 * @static
	 * @param	string $name The Element's name

	 * @return Element
	 */
	 public static function getChild($name){
		return parent::getChild($name);
	 }

	/**
	 * Get all children
	 *
	 * @static
	 * @return array
	 */
	 public static function getChildren(){
		return parent::getChildren();
	 }

	/**
	 * Check if the object has children
	 *
	 * @static
	 * @return boolean
	 */
	 public static function hasChildren(){
		return parent::hasChildren();
	 }

	/**
	 * Check if a given element is after another sibling
	 *
	 * @static
	 * @param	integer|string $sibling The sibling

	 * @return boolean
	 */
	 public static function isAfter($sibling){
		return parent::isAfter($sibling);
	 }

	/**
	 * Nests an object withing the current object
	 *
	 * @static
	 * @param	Tag|string $element	An element name or an Tag
	 * @param	string	$value	The Tag's alias or the element's content
	 * @param	array	$attributes

	 * @return Tag
	 */
	 public static function nest($element, $value = null, $attributes = array()){
		return parent::nest($element, $value, $attributes);
	 }

	/**
	 * Nest an array of objects/values
	 *
	 * @static
	 * @param	array $children
	 */
	 public static function nestChildren($children){
		parent::nestChildren($children);
	 }

	/**
	 * Add an object to the current object
	 *
	 * @static
	 * @param	string|TreeObject	$child The child
	 * @param	string	$name	Its name

	 * @return TreeObject
	 */
	 public static function setChild($child, $name = null){
		return parent::setChild($child, $name);
	 }

 }
}

namespace  {
 class Breadcrumb extends Bootstrapper\Breadcrumb{
	/**
	 * Creates the a new Breadcrumb.
	 *
	 * @static
	 * @param	array $links	An array of breadcrumbs links
	 * @param	array $attributes Attributes to apply the breadcrumbs wrapper

	 * @return string A breadcrumbs-styled unordered list
	 */
	 public static function create($links, $attributes = array()){
		return parent::create($links, $attributes);
	 }

 }
}

namespace  {
 class Button extends Bootstrapper\Button{
	/**
	 * Create a HTML submit input element.
	 * Overriding the default input submit button from Laravel\Form
	 *
	 * @static
	 * @param	string $value	Text value of button
	 * @param	array	$attributes	array of attributes
	 * @param	bool	$hasDropdown Whether the button has a dropdown

	 * @return object Button instance
	 */
	 public static function submit($value, $attributes = array(), $hasDropdown = false){
		return parent::submit($value, $attributes, $hasDropdown);
	 }

	/**
	 * Create a HTML reset input element.
	 * Overriding the default input reset button from Laravel\Form
	 *
	 * @static
	 * @param	string $value	Text value of button
	 * @param	array	$attributes	array of attributes
	 * @param	bool	$hasDropdown Whether the button has a dropdown

	 * @return object Button instance
	 */
	 public static function reset($value, $attributes = array(), $hasDropdown = false){
		return parent::reset($value, $attributes, $hasDropdown);
	 }

	/**
	 * Create a HTML button element.
	 * Overriding the default button to add the correct class from Laravel\Form
	 *
	 * @static
	 * @param	string $value	Text value of button
	 * @param	array	$attributes	array of attributes
	 * @param	bool	$hasDropdown Whether the button has a dropdown

	 * @return object Button instance
	 */
	 public static function normal($value, $attributes = array(), $hasDropdown = false){
		return parent::normal($value, $attributes, $hasDropdown);
	 }

	/**
	 * Create a HTML anchor tag styled like a button element.
	 *
	 * @static
	 * @param	string $url	Url of the link
	 * @param	string $value	Text value of button
	 * @param	array	$attributes	array of attributes
	 * @param	bool	$hasDropdown Whether the button has a dropdown

	 * @return object Button instance
	 */
	 public static function link($url, $value, $attributes = array(), $hasDropdown = false){
		return parent::link($url, $value, $attributes, $hasDropdown);
	 }

	/**
	 * Adds an icon to the next button
	 *
	 * @static
	 * @param	string	$icon	The name of the icon to call
	 * @param	array	$attributes	Attributes to pass to the generated icon
	 * @param	boolean $prependIcon Whether we should prepend the icon, or append it

	 * @return object Button instance
	 */
	 public static function with_icon($icon, $attributes = array(), $prependIcon = true){
		return parent::with_icon($icon, $attributes, $prependIcon);
	 }

	/**
	 * Alias for with_icon
	 *
	 * @static
	 * @param	string $icon	The name of the icon to call
	 * @param	array	$attributes Attributes to pass to the generated icon

	 * @return object Button instance
	 */
	 public static function prepend_with_icon($icon, $attributes = array()){
		return parent::prepend_with_icon($icon, $attributes);
	 }

	/**
	 * Alias for with_icon with $prependIcon to false
	 *
	 * @static
	 * @param	string $icon	The name of the icon to call
	 * @param	array	$attributes Attributes to pass to the generated icon

	 * @return object Button instance
	 */
	 public static function append_with_icon($icon, $attributes = array()){
		return parent::append_with_icon($icon, $attributes);
	 }

	/**
	 * Add class to deemphasize the button to look more like an anchor tag
	 *
	 * @static
	 * @return object Button instance
	 */
	 public static function deemphasize(){
		return parent::deemphasize();
	 }

	/**
	 * Add class to make button block
	 *
	 * @static
	 * @return object Button instance
	 */
	 public static function block(){
		return parent::block();
	 }

	/**
	 * Checks call to see if we can create a button from a magic call (for you wizards).
	 * success_button, mini_primary_button, large_warning_submit, danger_reset, etc...
	 *
	 * @static
	 * @param	string $method	Name of missing method
	 * @param	array	$parameters array of parameters passed to missing method

	 * @return mixed
	 */
	 public static function __callStatic($method, $parameters){
		return parent::__callStatic($method, $parameters);
	 }

	/**
	 * Prints the current button in memory
	 *
	 * @static
	 * @return string A button
	 */
	 public static function __toString(){
		return parent::__toString();
	 }

 }
}

namespace  {
 class ButtonGroup extends Bootstrapper\ButtonGroup{
	/**
	 * Opens a vertical button group
	 *
	 * @static
	 * @param	boolean $toggle	Whether the button group should be togglable
	 * @param	array	$attributes An array of attributes

	 * @return string An opening <div> tag
	 */
	 public static function vertical_open($toggle = null, $attributes = array()){
		return parent::vertical_open($toggle, $attributes);
	 }

	/**
	 * Alias for open so both horizontal_open and open can be used.
	 *
	 * @static
	 * @param	boolean $toggle	Whether the button group should be togglable
	 * @param	array	$attributes An array of attributes

	 * @return string An opening <div> tag
	 */
	 public static function horizontal_open($toggle = null, $attributes = array()){
		return parent::horizontal_open($toggle, $attributes);
	 }

	/**
	 * Opens a new ButtonGroup section.
	 *
	 * @static
	 * @param	string $toggle	Whether the button group should be togglable
	 * @param	array	$attributes An array of attributes

	 * @return string An opening <div> tag
	 */
	 public static function open($toggle = null, $attributes = array()){
		return parent::open($toggle, $attributes);
	 }

	/**
	 * Closes the ButtonGroup section.
	 *
	 * @static
	 * @return string
	 */
	 public static function close(){
		return parent::close();
	 }

 }
}

namespace  {
 class ButtonToolbar extends Bootstrapper\ButtonToolbar{
	/**
	 * Opens a new ButtonToolbar section.
	 *
	 * @static
	 * @param	array $attributes Attributes for the button toolbar

	 * @return string A button toolbar
	 */
	 public static function open($attributes = array()){
		return parent::open($attributes);
	 }

	/**
	 * Closes the ButtonToolbar section.
	 *
	 * @static
	 * @return string
	 */
	 public static function close(){
		return parent::close();
	 }

 }
}

namespace  {
 class Carousel extends Bootstrapper\Carousel{
	/**
	 * Create a Bootstrap carousel. Returns the HTML for the carousel.
	 *
	 * @static
	 * @param	array $items	An array of carousel items
	 * @param	array $attributes Attributes to apply the carousel itself

	 * @return Carousel
	 */
	 public static function create($items, $attributes = array()){
		return parent::create($items, $attributes);
	 }

	/**
	 * Renders a Carousel navigation for custom carousels
	 *
	 * @static
	 * @param	string $id	The Carousel ID
	 * @param	string $prev The previous link text
	 * @param	string $next The next link text
	 * @return string A Carousel navigation
	 */
	 public static function navigation($id, $prev, $next){
		return parent::navigation($id, $prev, $next);
	 }

	/**
	 * Creates a new Carousel instance
	 *
	 * @static
	 * @param	array $items	The items to use as pictures
	 * @param	array $attributes Its attributes
	 */
	 public static function __construct($items, $attributes = array()){
		parent::__construct($items, $attributes);
	 }

	/**
	 * Magic methods for the Carousel class
	 *
	 * @static
	 * @param	string	$method	The method
	 * @param	array	$parameters Its parameters
	 * @return Carousel
	 */
	 public static function __call($method, $parameters){
		return parent::__call($method, $parameters);
	 }

	/**
	 * Changes the text for the prev link
	 *
	 * @static
	 * @param	string	$prev The new text
	 * @return Carousel
	 */
	 public static function prev($next){
		return parent::prev($next);
	 }

	/**
	 * Changes the text for the next link
	 *
	 * @static
	 * @param	string	$next The new text
	 * @return Carousel
	 */
	 public static function next($next){
		return parent::next($next);
	 }

	/**
	 * Set which element will be the active one
	 *
	 * @static
	 * @param	integer	$key A key
	 * @return Carousel
	 */
	 public static function active($key){
		return parent::active($key);
	 }

	/**
	 * Set the current Carousel's #id
	 *
	 * @static
	 * @param	string	$id The new id
	 * @return Carousel
	 */
	 public static function id($id){
		return parent::id($id);
	 }

	/**
	 * Use a custom object schema for the images passed
	 *
	 * @static
	 * @param	array	$schema A schema array
	 * @return Carousel
	 */
	 public static function with_schema($schema){
		return parent::with_schema($schema);
	 }

	/**
	 * Prints out the current Carousel instance
	 *
	 * @static
	 * @return string A carousel
	 */
	 public static function __toString(){
		return parent::__toString();
	 }

 }
}

namespace  {
 class DropdownButton extends Bootstrapper\DropdownButton{
	/**
	 * Checks call to see if we can create a button from a magic call (for you wizards).
	 * normal, mini_primary, large_warning, danger, etc...
	 *
	 * @static
	 * @param	string $method	Name of missing method
	 * @param	array	$parameters array of parameters passed to missing method

	 * @return mixed
	 */
	 public static function __callStatic($method, $parameters){
		return parent::__callStatic($method, $parameters);
	 }

	/**
	 * Creates a new button dropdown
	 *
	 * @static
	 * @param	string $label	Label Text
	 * @param	array	$links	dropdown links
	 * @param	array	$attributes Attributes to apply the dropdown itself
	 * @param	string $type	Type of dropdown
	 */
	 public static function __construct($label, $links, $attributes, $type = null){
		parent::__construct($label, $links, $attributes, $type);
	 }

	/**
	 * Dynamically set an attribute
	 *
	 * @static
	 * @param	string $attribute Attributes to apply the dropdown itself
	 * @param	string $value	Value of dropdown

	 * @return object dropdownbutton instance
	 */
	 public static function __call($attribute, $value){
		return parent::__call($attribute, $value);
	 }

	/**
	 * Outputs the current Dropdown in instance
	 *
	 * @static
	 * @return string A Dropdown menu
	 */
	 public static function __toString(){
		return parent::__toString();
	 }

	/**
	 * Pull the dropdown's links to the right
	 *
	 * @static
	 * @param	boolean $pullRight Pull menu to the right

	 * @return object dropdownbutton instance
	 */
	 public static function pull_right($pullRight = true){
		return parent::pull_right($pullRight);
	 }

	/**
	 * Drop the menu up or down
	 *
	 * @static
	 * @param	boolean $dropup Make menu go up

	 * @return object dropdownbutton instance
	 */
	 public static function dropup($dropup = true){
		return parent::dropup($dropup);
	 }

	/**
	 * Make button a split dropdown button
	 *
	 * @static
	 * @param	boolean $split Make split button

	 * @return object dropdownbutton instance
	 */
	 public static function split($split = true){
		return parent::split($split);
	 }

	/**
	 * Auto route links or not
	 *
	 * @static
	 * @param	boolean $autoroute Should auto route links

	 * @return object dropdownbutton instance
	 */
	 public static function autoroute($autoroute = true){
		return parent::autoroute($autoroute);
	 }

 }
}

namespace  {
 class Helpers extends Bootstrapper\Helpers{
	/**
	 * Function adds the given value to an array. If the key already
	 * exists the value is concatenated to the end of the string.
	 * Mainly used for adding classes.
	 *
	 * @static
	 * @param	array	$array Array object to be added to
	 * @param	string $value String value
	 * @param	string $key	Array key to use

	 * @return array
	 */
	 public static function add_class($array, $value, $key = 'class'){
		return parent::add_class($array, $value, $key);
	 }

	/**
	 * Function to create a random string of a differing length used for creating IDs
	 *
	 * @static
	 * @param	int $length Length of the random string

	 * @return string
	 */
	 public static function rand_string($length){
		return parent::rand_string($length);
	 }

	/**
	 * Function used to prime the attributes array for dynamic calls.
	 *
	 * @static
	 * @param	string $exclude	String to exclude from array
	 * @param	array	$class_array	Class array
	 * @param	array	$params	Parameters array
	 * @param	int	$index	Index of the parameters array to use
	 * @param	string $extra	Prefix to the class
	 * @param	string $extra_unless Value to exclude the prefix from

	 * @return array
	 */
	 public static function set_multi_class_attributes($exclude, $class_array, $params, $index, $extra = '', $extra_unless = null){
		return parent::set_multi_class_attributes($exclude, $class_array, $params, $index, $extra, $extra_unless);
	 }

 }
}

namespace  {
 class Icon extends Bootstrapper\Icon{
	/**
	 * Build a new icon
	 *
	 * @static
	 * @param	array $attributes
	 */
	 public static function __construct($attributes = array()){
		parent::__construct($attributes);
	 }

	/**
	 * Allows magic methods such as Icon::home([attributes]) or Icon::close_white()
	 * 
	 * Sample Usage:
	 * <code>
	 * <?php
	 * Icon::plus();
	 * // <i class="icon-plus"></i>
	 * Icon::folder_open(array('class'=>'widget','data-foo'=>'bar'));
	 * // <i class="widget icon-folder-open" data-foo="bar"></i>
	 * Icon::circle_arrow_right_white();
	 * // <i class="icon-circle-arrow-right icon-white"></i>
	 * ?>
	 * </code>
	 *
	 * @static
	 * @param	string $method	Name of missing method
	 * @param	array	$parameters array of parameters passed to missing method

	 * @return string
	 */
	 public static function __callStatic($method, $parameters){
		return parent::__callStatic($method, $parameters);
	 }

	/**
	 * Return icon HTML using alternate syntax.
	 * Overload via __callStatic() allows calls like Icon::check() or Icon::paper_clip_white()
	 * but code-inspecting IDEs will show the method as undefined, and there are just way too many
	 * icon classes to use @ method docblock instead
	 * 
	 * Sample Usage:
	 * <code>
	 * <?php
	 * Icon::make('folder-open',array('class'=>'widget'));
	 * // <i class="widget icon-folder-open"></i>
	 * ?>
	 * </code>
	 *
	 * @static
	 * @param	string $icon	Name of the bootstrap icon class
	 * @param	array	$attributes Attributes to apply the icon itself

	 * @return string
	 */
	 public static function make($icon, $attributes = array()){
		return parent::make($icon, $attributes);
	 }

	/**
	 * Wrap the Element in another element
	 *
	 * @static
	 * @param	string|Element $element The element's tag

	 * @return Element
	 */
	 public static function wrapWith($element, $name = null){
		return parent::wrapWith($element, $name);
	 }

	/**
	 * Render on string conversion
	 *
	 * @static
	 * @return string
	 */
	 public static function __toString(){
		return parent::__toString();
	 }

	/**
	 * Opens the Tag
	 *
	 * @static
	 * @return string
	 */
	 public static function open(){
		return parent::open();
	 }

	/**
	 * Open the tag tree on a particular child
	 *
	 * @static
	 * @param	string $onChild The child's key

	 * @return string
	 */
	 public static function openOn($onChildren){
		return parent::openOn($onChildren);
	 }

	/**
	 * Check if the tag is opened
	 *
	 * @static
	 * @return boolean
	 */
	 public static function isOpened(){
		return parent::isOpened();
	 }

	/**
	 * Returns the Tag's content
	 *
	 * @static
	 * @return string
	 */
	 public static function getContent(){
		return parent::getContent();
	 }

	/**
	 * Close the Tag
	 *
	 * @static
	 * @return string
	 */
	 public static function close(){
		return parent::close();
	 }

	/**
	 * Default rendering method
	 *
	 * @static
	 * @return string
	 */
	 public static function render(){
		return parent::render();
	 }

	/**
	 * Dynamically set attributes
	 *
	 * @static
	 * @param	string $method	An attribute
	 * @param	array	$parameters Its value(s)
	 */
	 public static function __call($method, $parameters){
		parent::__call($method, $parameters);
	 }

	/**
	 * Dynamically set an attribute
	 *
	 * @static
	 * @param	string $attribute The attribute
	 * @param	string $value	Its value
	 */
	 public static function __set($attribute, $value){
		parent::__set($attribute, $value);
	 }

	/**
	 * Get an attribute or a child
	 *
	 * @static
	 * @param	string $item The desired child/attribute

	 * @return mixed
	 */
	 public static function __get($item){
		return parent::__get($item);
	 }

	/**
	 * Changes the Tag's element
	 *
	 * @static
	 * @param	string $element
	 */
	 public static function setElement($element){
		parent::setElement($element);
	 }

	/**
	 * Change the object's value
	 *
	 * @static
	 * @param	string $value
	 */
	 public static function setValue($value){
		parent::setValue($value);
	 }

	/**
	 * Wrap the value in a tag
	 *
	 * @static
	 * @param	string $tag The tag
	 */
	 public static function wrapValue($tag){
		parent::wrapValue($tag);
	 }

	/**
	 * Get the value
	 *
	 * @static
	 * @return string
	 */
	 public static function getValue(){
		return parent::getValue();
	 }

	/**
	 * Set an attribute
	 *
	 * @static
	 * @param	string $attribute An attribute
	 * @param	string $value	Its value
	 */
	 public static function setAttribute($attribute, $value = null){
		parent::setAttribute($attribute, $value);
	 }

	/**
	 * Set a bunch of parameters at once
	 *
	 * @static
	 * @param	array $attributes The attributes to add to the existing ones

	 * @return Tag
	 */
	 public static function setAttributes($attributes){
		return parent::setAttributes($attributes);
	 }

	/**
	 * Get all attributes
	 *
	 * @static
	 * @return array
	 */
	 public static function getAttributes(){
		return parent::getAttributes();
	 }

	/**
	 * Replace all attributes with the provided array
	 *
	 * @static
	 * @param	array $attributes The attributes to replace with

	 * @return Tag
	 */
	 public static function replaceAttributes($attributes){
		return parent::replaceAttributes($attributes);
	 }

	/**
	 * Add one or more classes to the current field
	 *
	 * @static
	 * @param	string $class The class(es) to add
	 */
	 public static function addClass($class){
		parent::addClass($class);
	 }

	/**
	 * Remove one or more classes to the current field
	 *
	 * @static
	 * @param	string $class The class(es) to remove
	 */
	 public static function removeClass($class){
		parent::removeClass($class);
	 }

	/**
	 * Get the Element's parent
	 *
	 * @static
	 * @param	integer $levels The number of levels to go back up

	 * @return Element
	 */
	 public static function getParent($levels = null){
		return parent::getParent($levels);
	 }

	/**
	 * Set the parent of the element
	 *
	 * @static
	 * @param	TreeObject $parent

	 * @return TreeObject
	 */
	 public static function setParent($parent){
		return parent::setParent($parent);
	 }

	/**
	 * Check if an object has a parent
	 *
	 * @static
	 * @return boolean
	 */
	 public static function hasParent(){
		return parent::hasParent();
	 }

	/**
	 * Get a specific child of the element
	 *
	 * @static
	 * @param	string $name The Element's name

	 * @return Element
	 */
	 public static function getChild($name){
		return parent::getChild($name);
	 }

	/**
	 * Get all children
	 *
	 * @static
	 * @return array
	 */
	 public static function getChildren(){
		return parent::getChildren();
	 }

	/**
	 * Check if the object has children
	 *
	 * @static
	 * @return boolean
	 */
	 public static function hasChildren(){
		return parent::hasChildren();
	 }

	/**
	 * Check if a given element is after another sibling
	 *
	 * @static
	 * @param	integer|string $sibling The sibling

	 * @return boolean
	 */
	 public static function isAfter($sibling){
		return parent::isAfter($sibling);
	 }

	/**
	 * Nests an object withing the current object
	 *
	 * @static
	 * @param	Tag|string $element	An element name or an Tag
	 * @param	string	$value	The Tag's alias or the element's content
	 * @param	array	$attributes

	 * @return Tag
	 */
	 public static function nest($element, $value = null, $attributes = array()){
		return parent::nest($element, $value, $attributes);
	 }

	/**
	 * Nest an array of objects/values
	 *
	 * @static
	 * @param	array $children
	 */
	 public static function nestChildren($children){
		parent::nestChildren($children);
	 }

	/**
	 * Add an object to the current object
	 *
	 * @static
	 * @param	string|TreeObject	$child The child
	 * @param	string	$name	Its name

	 * @return TreeObject
	 */
	 public static function setChild($child, $name = null){
		return parent::setChild($child, $name);
	 }

 }
}

namespace  {
 class Image extends Bootstrapper\Image{
	/**
	 * Catch-all method
	 *
	 * @static
	 */
	 public static function __callStatic($method, $parameters){
		parent::__callStatic($method, $parameters);
	 }

 }
}

namespace  {
 class Label extends Bootstrapper\Label{
	/**
	 * Create a custom label (this is here for backward compatibility)
	 *
	 * @static
	 * @param	string $type	The label type
	 * @param	string $message	The content
	 * @param	array	$attributes The attributes

	 * @return Label
	 */
	 public static function custom($type, $message, $attributes){
		return parent::custom($type, $message, $attributes);
	 }

	/**
	 * Dynamically create labels
	 *
	 * @static
	 */
	 public static function __callStatic($method, $parameters){
		parent::__callStatic($method, $parameters);
	 }

	/**
	 * Creates a basic Element
	 *
	 * @static
	 * @param	string $element
	 * @param	string $value
	 * @param	array	$attributes

	 * @return Element
	 */
	 public static function __construct($element = null, $value = null, $attributes = array()){
		return parent::__construct($element, $value, $attributes);
	 }

	/**
	 * Static alias for constructor
	 *
	 * @static
	 * @param	string	$element
	 * @param	string|null|Tag $value
	 * @param	array	$attributes
	 * @return Element
	 */
	 public static function create($element = null, $value = null, $attributes = array()){
		return parent::create($element, $value, $attributes);
	 }

	/**
	 * Wrap the Element in another element
	 *
	 * @static
	 * @param	string|Element $element The element's tag

	 * @return Element
	 */
	 public static function wrapWith($element, $name = null){
		return parent::wrapWith($element, $name);
	 }

	/**
	 * Render on string conversion
	 *
	 * @static
	 * @return string
	 */
	 public static function __toString(){
		return parent::__toString();
	 }

	/**
	 * Opens the Tag
	 *
	 * @static
	 * @return string
	 */
	 public static function open(){
		return parent::open();
	 }

	/**
	 * Open the tag tree on a particular child
	 *
	 * @static
	 * @param	string $onChild The child's key

	 * @return string
	 */
	 public static function openOn($onChildren){
		return parent::openOn($onChildren);
	 }

	/**
	 * Check if the tag is opened
	 *
	 * @static
	 * @return boolean
	 */
	 public static function isOpened(){
		return parent::isOpened();
	 }

	/**
	 * Returns the Tag's content
	 *
	 * @static
	 * @return string
	 */
	 public static function getContent(){
		return parent::getContent();
	 }

	/**
	 * Close the Tag
	 *
	 * @static
	 * @return string
	 */
	 public static function close(){
		return parent::close();
	 }

	/**
	 * Default rendering method
	 *
	 * @static
	 * @return string
	 */
	 public static function render(){
		return parent::render();
	 }

	/**
	 * Dynamically set attributes
	 *
	 * @static
	 * @param	string $method	An attribute
	 * @param	array	$parameters Its value(s)
	 */
	 public static function __call($method, $parameters){
		parent::__call($method, $parameters);
	 }

	/**
	 * Dynamically set an attribute
	 *
	 * @static
	 * @param	string $attribute The attribute
	 * @param	string $value	Its value
	 */
	 public static function __set($attribute, $value){
		parent::__set($attribute, $value);
	 }

	/**
	 * Get an attribute or a child
	 *
	 * @static
	 * @param	string $item The desired child/attribute

	 * @return mixed
	 */
	 public static function __get($item){
		return parent::__get($item);
	 }

	/**
	 * Changes the Tag's element
	 *
	 * @static
	 * @param	string $element
	 */
	 public static function setElement($element){
		parent::setElement($element);
	 }

	/**
	 * Change the object's value
	 *
	 * @static
	 * @param	string $value
	 */
	 public static function setValue($value){
		parent::setValue($value);
	 }

	/**
	 * Wrap the value in a tag
	 *
	 * @static
	 * @param	string $tag The tag
	 */
	 public static function wrapValue($tag){
		parent::wrapValue($tag);
	 }

	/**
	 * Get the value
	 *
	 * @static
	 * @return string
	 */
	 public static function getValue(){
		return parent::getValue();
	 }

	/**
	 * Set an attribute
	 *
	 * @static
	 * @param	string $attribute An attribute
	 * @param	string $value	Its value
	 */
	 public static function setAttribute($attribute, $value = null){
		parent::setAttribute($attribute, $value);
	 }

	/**
	 * Set a bunch of parameters at once
	 *
	 * @static
	 * @param	array $attributes The attributes to add to the existing ones

	 * @return Tag
	 */
	 public static function setAttributes($attributes){
		return parent::setAttributes($attributes);
	 }

	/**
	 * Get all attributes
	 *
	 * @static
	 * @return array
	 */
	 public static function getAttributes(){
		return parent::getAttributes();
	 }

	/**
	 * Replace all attributes with the provided array
	 *
	 * @static
	 * @param	array $attributes The attributes to replace with

	 * @return Tag
	 */
	 public static function replaceAttributes($attributes){
		return parent::replaceAttributes($attributes);
	 }

	/**
	 * Add one or more classes to the current field
	 *
	 * @static
	 * @param	string $class The class(es) to add
	 */
	 public static function addClass($class){
		parent::addClass($class);
	 }

	/**
	 * Remove one or more classes to the current field
	 *
	 * @static
	 * @param	string $class The class(es) to remove
	 */
	 public static function removeClass($class){
		parent::removeClass($class);
	 }

	/**
	 * Get the Element's parent
	 *
	 * @static
	 * @param	integer $levels The number of levels to go back up

	 * @return Element
	 */
	 public static function getParent($levels = null){
		return parent::getParent($levels);
	 }

	/**
	 * Set the parent of the element
	 *
	 * @static
	 * @param	TreeObject $parent

	 * @return TreeObject
	 */
	 public static function setParent($parent){
		return parent::setParent($parent);
	 }

	/**
	 * Check if an object has a parent
	 *
	 * @static
	 * @return boolean
	 */
	 public static function hasParent(){
		return parent::hasParent();
	 }

	/**
	 * Get a specific child of the element
	 *
	 * @static
	 * @param	string $name The Element's name

	 * @return Element
	 */
	 public static function getChild($name){
		return parent::getChild($name);
	 }

	/**
	 * Get all children
	 *
	 * @static
	 * @return array
	 */
	 public static function getChildren(){
		return parent::getChildren();
	 }

	/**
	 * Check if the object has children
	 *
	 * @static
	 * @return boolean
	 */
	 public static function hasChildren(){
		return parent::hasChildren();
	 }

	/**
	 * Check if a given element is after another sibling
	 *
	 * @static
	 * @param	integer|string $sibling The sibling

	 * @return boolean
	 */
	 public static function isAfter($sibling){
		return parent::isAfter($sibling);
	 }

	/**
	 * Nests an object withing the current object
	 *
	 * @static
	 * @param	Tag|string $element	An element name or an Tag
	 * @param	string	$value	The Tag's alias or the element's content
	 * @param	array	$attributes

	 * @return Tag
	 */
	 public static function nest($element, $value = null, $attributes = array()){
		return parent::nest($element, $value, $attributes);
	 }

	/**
	 * Nest an array of objects/values
	 *
	 * @static
	 * @param	array $children
	 */
	 public static function nestChildren($children){
		parent::nestChildren($children);
	 }

	/**
	 * Add an object to the current object
	 *
	 * @static
	 * @param	string|TreeObject	$child The child
	 * @param	string	$name	Its name

	 * @return TreeObject
	 */
	 public static function setChild($child, $name = null){
		return parent::setChild($child, $name);
	 }

 }
}

namespace  {
 class MediaObject extends Bootstrapper\MediaObject{
	/**
	 * Statically creates a new MediaObject instance
	 *
	 * @static
	 * @param	string	$content	Its content
	 * @param	string	$media	Its media
	 * @param	array	$attributes The media object's attributes
	 * @return MediaObject
	 */
	 public static function create($content, $media = null, $attributes = array()){
		return parent::create($content, $media, $attributes);
	 }

	/**
	 * Opens a Media Object list
	 *
	 * @static
	 * @param	array	$attributes An array of attributes
	 * @return string An opening tag
	 */
	 public static function open_list($attributes = array()){
		return parent::open_list($attributes);
	 }

	/**
	 * Closes an existing Media Objects list
	 *
	 * @static
	 * @return string A closing tag
	 */
	 public static function close_list(){
		return parent::close_list();
	 }

	/**
	 * Creates a new MediaObject instance
	 *
	 * @static
	 * @param	string $content Its content
	 * @param	string $media	Its media
	 */
	 public static function __construct($content, $media = null){
		parent::__construct($content, $media);
	 }

	/**
	 * Magic methods for MediaObject
	 *
	 * @static
	 * @param	string	$method	The method called
	 * @param	array	$parameters Its parameters
	 * @return MediaObject
	 */
	 public static function __call($method, $parameters){
		return parent::__call($method, $parameters);
	 }

	/**
	 * Add a media to the MediaObject
	 *
	 * @static
	 * @param	string	$image	The path to the image
	 * @param	string	$alt	Its alt attribute
	 * @param	array	$attributes An array of supplementary attributes
	 * @return MediaObject
	 */
	 public static function with_image($image, $alt = null, $attributes = array()){
		return parent::with_image($image, $alt, $attributes);
	 }

	/**
	 * Add a raw title to the MediaObject
	 *
	 * @static
	 * @param	string	$title The text of the title
	 * @return MediaObject
	 */
	 public static function with_title($title){
		return parent::with_title($title);
	 }

	/**
	 * Pull the media to a side
	 *
	 * @static
	 * @param	string	$side Left or right
	 * @return MediaObject
	 */
	 public static function pull($side){
		return parent::pull($side);
	 }

	/**
	 * Nests a new instance of MediaObject into the existing one
	 *
	 * @static
	 * @param	MediaObject $mediaObject The new MediaObject to nest
	 * @return MediaObject
	 */
	 public static function nest($mediaObject){
		return parent::nest($mediaObject);
	 }

	/**
	 * Prints out the MediaObject in memory
	 *
	 * @static
	 * @return string The HTML markup for the media object
	 */
	 public static function __toString(){
		return parent::__toString();
	 }

 }
}

namespace  {
 class Navbar extends Bootstrapper\Navbar{
	/**
	 * Create a new Navbar instance.
	 *
	 * @static
	 * @param	array $attributes An array of attributes for the current navbar
	 * @param	const $type	The type of Navbar to create

	 * @return Navbar
	 */
	 public static function create($attributes = array(), $type = ''){
		return parent::create($attributes, $type);
	 }

	/**
	 * Set the autoroute to true or false
	 *
	 * @static
	 * @param	boolean $autoroute The new autoroute value

	 * @return Navbar
	 */
	 public static function autoroute($autoroute){
		return parent::autoroute($autoroute);
	 }

	/**
	 * Add menus or strings to the current Navbar
	 *
	 * @static
	 * @param	mixed $menus	An array of items or a string
	 * @param	array $attributes An array of attributes to use

	 * @return Navbar
	 */
	 public static function with_menus($menus, $attributes = array()){
		return parent::with_menus($menus, $attributes);
	 }

	/**
	 * Add a brand to the current Navbar
	 *
	 * @static
	 * @param	string $brand	The brand name
	 * @param	string $brand_url The brand URL

	 * @return Navbar
	 */
	 public static function with_brand($brand, $brand_url){
		return parent::with_brand($brand, $brand_url);
	 }

	/**
	 * Activates collapsible on the current Navbar
	 *
	 * @static
	 * @return Navbar
	 */
	 public static function collapsible(){
		return parent::collapsible();
	 }

	/**
	 * Prints out the current Navbar in case it doesn't do it automatically
	 *
	 * @static
	 * @return string A Navbar
	 */
	 public static function get(){
		return parent::get();
	 }

	/**
	 * Writes the current Navbar
	 *
	 * @static
	 * @return string A Bootstrap navbar
	 */
	 public static function __toString(){
		return parent::__toString();
	 }

	/**
	 * Allows creation of inverted navbar
	 *
	 * @static
	 * @param	string $method	The method to call
	 * @param	array	$parameters An array of parameters

	 * @return Navbar
	 */
	 public static function __callStatic($method, $parameters){
		return parent::__callStatic($method, $parameters);
	 }

 }
}

namespace  {
 class Navigation extends Bootstrapper\Navigation{
	/**
	 * Generates a nav menu and any dropdown if the $list array contains any dropdown objects.
	 *
	 * @static
	 * @param	array	$list	Menu items
	 * @param	string $type	Menu Type
	 * @param	bool	$stacked	Should menu be stacked
	 * @param	array	$attributes attributes to apply the nav
	 * @param	bool	$autoroute	Autoroute links

	 * @return string
	 */
	 public static function menu($list, $type = '', $stacked = false, $attributes = array(), $autoroute = true, $isDropdown = false){
		return parent::menu($list, $type, $stacked, $attributes, $autoroute, $isDropdown);
	 }

	/**
	 * Creates a Bootstrap plan unstyled menu.
	 *
	 * @static
	 * @param	array $list	Menu items
	 * @param	bool	$stacked	Should it be stacked
	 * @param	array $attributes attributes to apply the nav
	 * @param	bool	$autoroute	Autoroute links

	 * @return string
	 */
	 public static function unstyled($list, $stacked = false, $attributes = array(), $autoroute = true){
		return parent::unstyled($list, $stacked, $attributes, $autoroute);
	 }

	/**
	 * Creates a Bootstrap Tabs menu.
	 *
	 * @static
	 * @param	array $list	Menu items
	 * @param	bool	$stacked	Should it be stacked
	 * @param	array $attributes attributes to apply the nav
	 * @param	bool	$autoroute	Autoroute links

	 * @return string
	 */
	 public static function tabs($list, $stacked = false, $attributes = array(), $autoroute = true){
		return parent::tabs($list, $stacked, $attributes, $autoroute);
	 }

	/**
	 * Creates a Bootstrap Pills menu.
	 *
	 * @static
	 * @param	array $list	Menu items
	 * @param	bool	$stacked	Should it be stacked
	 * @param	array $attributes attributes to apply the nav
	 * @param	bool	$autoroute	Autoroute links

	 * @return string
	 */
	 public static function pills($list, $stacked = false, $attributes = array(), $autoroute = true){
		return parent::pills($list, $stacked, $attributes, $autoroute);
	 }

	/**
	 * Creates a Bootstrap Lists menu.
	 *
	 * @static
	 * @param	array $list	Menu items
	 * @param	bool	$stacked	Should it be stacked
	 * @param	array $attributes attributes to apply the nav
	 * @param	bool	$autoroute	Autoroute links

	 * @return string
	 */
	 public static function lists($list, $stacked = false, $attributes = array(), $autoroute = true){
		return parent::lists($list, $stacked, $attributes, $autoroute);
	 }

	/**
	 * Creates a Bootstrap Dropdown menu.
	 *
	 * @static
	 * @param	array $list	Menu items
	 * @param	array $attributes attributes to apply the nav
	 * @param	bool	$autoroute	Autoroute links

	 * @return string
	 */
	 public static function dropdown($list, $attributes = array(), $autoroute = true){
		return parent::dropdown($list, $attributes, $autoroute);
	 }

	/**
	 * A simple clean way to create a single link array.
	 *
	 * @static
	 * @param	string $label	Link name
	 * @param	bool	$active	Set current tab as active
	 * @param	bool	$disabled Disabled the current tab
	 * @param	array	$items	Array of for dropdown items

	 * @return mixed
	 */
	 public static function link($label, $url, $active = false, $disabled = false, $items = null, $icon = null, $visible = true){
		return parent::link($label, $url, $active, $disabled, $items, $icon, $visible);
	 }

	/**
	 * A simple clean way to create the associative array required for a Navigation item
	 *
	 * @static
	 * @param	array $links array of links

	 * @return mixed
	 */
	 public static function links($links){
		return parent::links($links);
	 }

 }
}

namespace  {
 class Progress extends Bootstrapper\Progress{
	/**
	 * Create a new Normal Progress Bar.
	 *
	 * @static
	 * @param	integer $amount	Amount filled
	 * @param	array	$attributes array of attributes for progress bar

	 * @return string
	 */
	 public static function normal($amount = 0, $attributes = array()){
		return parent::normal($amount, $attributes);
	 }

	/**
	 * Create a new Success Progress Bar.
	 *
	 * @static
	 * @param	integer $amount	Amount filled
	 * @param	array	$attributes array of attributes for progress bar

	 * @return string
	 */
	 public static function success($amount = 0, $attributes = array()){
		return parent::success($amount, $attributes);
	 }

	/**
	 * Create a new Info Progress Bar.
	 *
	 * @static
	 * @param	integer $amount	Amount filled
	 * @param	array	$attributes array of attributes for progress bar

	 * @return string
	 */
	 public static function info($amount = 0, $attributes = array()){
		return parent::info($amount, $attributes);
	 }

	/**
	 * Create a new Warning Progress Bar.
	 *
	 * @static
	 * @param	integer $amount	Amount filled
	 * @param	array	$attributes array of attributes for progress bar

	 * @return string
	 */
	 public static function warning($amount = 0, $attributes = array()){
		return parent::warning($amount, $attributes);
	 }

	/**
	 * Create a new Danger Progress Bar.
	 *
	 * @static
	 * @param	integer $amount	Amount filled
	 * @param	array	$attributes array of attributes for progress bar

	 * @return string
	 */
	 public static function danger($amount = 0, $attributes = array()){
		return parent::danger($amount, $attributes);
	 }

	/**
	 * Automatically computes the progress bar's class according to the amount
	 * Thus 0 giving it a danger class and 100 giving it a success class
	 *
	 * @static
	 * @param	integer $amount	Amount filled
	 * @param	array	$attributes array of attributes for progress bar

	 * @return string
	 */
	 public static function automatic($amount = 0, $attributes = array()){
		return parent::automatic($amount, $attributes);
	 }

	/**
	 * Checks call to see if we can create a progress bar from a magic call (for you wizards).
	 * normal_striped_active, info_striped, etc...
	 *
	 * @static
	 * @param	string $method	Method name
	 * @param	array	$parameters Method parameters

	 * @return mixed
	 */
	 public static function __callStatic($method, $parameters){
		return parent::__callStatic($method, $parameters);
	 }

 }
}

namespace  {
 class Tabbable extends Bootstrapper\Tabbable{
	/**
	 * Generate a Bootstrap tabbable object.
	 *
	 * @static
	 * @param	array $menu	Tab items
	 * @param	array $attributes Attributes for the tabs

	 * @return string
	 */
	 public static function create($menu, $attributes = array()){
		return parent::create($menu, $attributes);
	 }

	/**
	 * Set the placement to Tabbable enum
	 *
	 * @static
	 * @param	string $placement The new placement value

	 * @return Tabbable
	 */
	 public static function placement($placement){
		return parent::placement($placement);
	 }

	/**
	 * Set the menu style to Navigation enum
	 *
	 * @static
	 * @param	string $style The new menu style value

	 * @return Tabbable
	 */
	 public static function style($style){
		return parent::style($style);
	 }

	/**
	 * Set the stacked value to true or false
	 *
	 * @static
	 * @param	boolean $stacked The new stacked value

	 * @return Tabbable
	 */
	 public static function stacked($stacked = true){
		return parent::stacked($stacked);
	 }

	/**
	 * Add menus or strings to the current Tabbable
	 *
	 * @static
	 * @param	array $attributes An array of attributes to use

	 * @return Tabbable
	 */
	 public static function menu_attributes($attributes = array()){
		return parent::menu_attributes($attributes);
	 }

	/**
	 * Add attributes to the content of the current Tabbable
	 *
	 * @static
	 * @param	array $attributes An array of attributes to use

	 * @return Tabbable
	 */
	 public static function content_attributes($attributes){
		return parent::content_attributes($attributes);
	 }

	/**
	 * Set the autoroute to true or false
	 *
	 * @static
	 * @param	boolean $autoroute The new autoroute value

	 * @return Tabbable
	 */
	 public static function autoroute($autoroute){
		return parent::autoroute($autoroute);
	 }

	/**
	 * Prints out the current Tabbable in case it doesn't do it automatically
	 *
	 * @static
	 * @return string A Tabbable
	 */
	 public static function get(){
		return parent::get();
	 }

	/**
	 * Writes the current Tabbable
	 *
	 * @static
	 * @return string A Bootstrap Tabbable
	 */
	 public static function __toString(){
		return parent::__toString();
	 }

	/**
	 * Checks call to see if we can create a tabbable from a magic call (for you wizards).
	 * tabs_above, tabs_left, pills, lists, etc...
	 *
	 * @static
	 * @param	string $method	Method name
	 * @param	array	$parameters Method parameters

	 * @return mixed
	 */
	 public static function __callStatic($method, $parameters){
		return parent::__callStatic($method, $parameters);
	 }

 }
}

namespace  {
 class Table extends Bootstrapper\Table{
	/**
	 * Checks call to see if we can create a table from a magic call (for you wizards).
	 * hover_striped, bordered_condensed, etc.
	 *
	 * @static
	 * @param	string $method	Method name
	 * @param	array	$parameters Method parameters

	 * @return mixed
	 */
	 public static function __callStatic($method, $parameters){
		return parent::__callStatic($method, $parameters);
	 }

	/**
	 * Pass a method to the Table instance
	 *
	 * @static
	 * @param	string $method	The method to call
	 * @param	array	$parameters Its parameters
	 * @return Table
	 */
	 public static function __call($method, $parameters){
		return parent::__call($method, $parameters);
	 }

	/**
	 * Dynamically set a column's content
	 *
	 * @static
	 * @param	string $column	The column's name and classes
	 * @param	mixed	$content Its content
	 */
	 public static function __set($column, $content){
		parent::__set($column, $content);
	 }

	/**
	 * 
	 *
	 * @static
	 */
	 public static function table(){
		parent::table();
	 }

	/**
	 * Renders the Table
	 *
	 * @static
	 * @return string
	 */
	 public static function __toString(){
		return parent::__toString();
	 }

	/**
	 * Outputs the current body in memory
	 *
	 * @static
	 * @return string A <tbody> with content
	 */
	 public static function render(){
		return parent::render();
	 }

 }
}

namespace  {
 class Thumbnail extends Bootstrapper\Thumbnail{
	/**
	 * Create a new thumbnail grid
	 *
	 * @static
	 * @param	array $attributes
	 */
	 public static function __construct($attributes = array(), $presenter = null){
		parent::__construct($attributes, $presenter);
	 }

	/**
	 * Create a grid of thumbnails
	 *
	 * @static
	 * @param	array	$images	An array of images paths
	 * @param	Callable $presenter A presenter

	 * @return Thumbnail
	 */
	 public static function create($images = null, $presenter = null, $attributes = array()){
		return parent::create($images, $presenter, $attributes);
	 }

	/**
	 * Wrap the Element in another element
	 *
	 * @static
	 * @param	string|Element $element The element's tag

	 * @return Element
	 */
	 public static function wrapWith($element, $name = null){
		return parent::wrapWith($element, $name);
	 }

	/**
	 * Render on string conversion
	 *
	 * @static
	 * @return string
	 */
	 public static function __toString(){
		return parent::__toString();
	 }

	/**
	 * Opens the Tag
	 *
	 * @static
	 * @return string
	 */
	 public static function open(){
		return parent::open();
	 }

	/**
	 * Open the tag tree on a particular child
	 *
	 * @static
	 * @param	string $onChild The child's key

	 * @return string
	 */
	 public static function openOn($onChildren){
		return parent::openOn($onChildren);
	 }

	/**
	 * Check if the tag is opened
	 *
	 * @static
	 * @return boolean
	 */
	 public static function isOpened(){
		return parent::isOpened();
	 }

	/**
	 * Returns the Tag's content
	 *
	 * @static
	 * @return string
	 */
	 public static function getContent(){
		return parent::getContent();
	 }

	/**
	 * Close the Tag
	 *
	 * @static
	 * @return string
	 */
	 public static function close(){
		return parent::close();
	 }

	/**
	 * Default rendering method
	 *
	 * @static
	 * @return string
	 */
	 public static function render(){
		return parent::render();
	 }

	/**
	 * Dynamically set attributes
	 *
	 * @static
	 * @param	string $method	An attribute
	 * @param	array	$parameters Its value(s)
	 */
	 public static function __call($method, $parameters){
		parent::__call($method, $parameters);
	 }

	/**
	 * Dynamically set an attribute
	 *
	 * @static
	 * @param	string $attribute The attribute
	 * @param	string $value	Its value
	 */
	 public static function __set($attribute, $value){
		parent::__set($attribute, $value);
	 }

	/**
	 * Get an attribute or a child
	 *
	 * @static
	 * @param	string $item The desired child/attribute

	 * @return mixed
	 */
	 public static function __get($item){
		return parent::__get($item);
	 }

	/**
	 * Changes the Tag's element
	 *
	 * @static
	 * @param	string $element
	 */
	 public static function setElement($element){
		parent::setElement($element);
	 }

	/**
	 * Change the object's value
	 *
	 * @static
	 * @param	string $value
	 */
	 public static function setValue($value){
		parent::setValue($value);
	 }

	/**
	 * Wrap the value in a tag
	 *
	 * @static
	 * @param	string $tag The tag
	 */
	 public static function wrapValue($tag){
		parent::wrapValue($tag);
	 }

	/**
	 * Get the value
	 *
	 * @static
	 * @return string
	 */
	 public static function getValue(){
		return parent::getValue();
	 }

	/**
	 * Set an attribute
	 *
	 * @static
	 * @param	string $attribute An attribute
	 * @param	string $value	Its value
	 */
	 public static function setAttribute($attribute, $value = null){
		parent::setAttribute($attribute, $value);
	 }

	/**
	 * Set a bunch of parameters at once
	 *
	 * @static
	 * @param	array $attributes The attributes to add to the existing ones

	 * @return Tag
	 */
	 public static function setAttributes($attributes){
		return parent::setAttributes($attributes);
	 }

	/**
	 * Get all attributes
	 *
	 * @static
	 * @return array
	 */
	 public static function getAttributes(){
		return parent::getAttributes();
	 }

	/**
	 * Replace all attributes with the provided array
	 *
	 * @static
	 * @param	array $attributes The attributes to replace with

	 * @return Tag
	 */
	 public static function replaceAttributes($attributes){
		return parent::replaceAttributes($attributes);
	 }

	/**
	 * Add one or more classes to the current field
	 *
	 * @static
	 * @param	string $class The class(es) to add
	 */
	 public static function addClass($class){
		parent::addClass($class);
	 }

	/**
	 * Remove one or more classes to the current field
	 *
	 * @static
	 * @param	string $class The class(es) to remove
	 */
	 public static function removeClass($class){
		parent::removeClass($class);
	 }

	/**
	 * Get the Element's parent
	 *
	 * @static
	 * @param	integer $levels The number of levels to go back up

	 * @return Element
	 */
	 public static function getParent($levels = null){
		return parent::getParent($levels);
	 }

	/**
	 * Set the parent of the element
	 *
	 * @static
	 * @param	TreeObject $parent

	 * @return TreeObject
	 */
	 public static function setParent($parent){
		return parent::setParent($parent);
	 }

	/**
	 * Check if an object has a parent
	 *
	 * @static
	 * @return boolean
	 */
	 public static function hasParent(){
		return parent::hasParent();
	 }

	/**
	 * Get a specific child of the element
	 *
	 * @static
	 * @param	string $name The Element's name

	 * @return Element
	 */
	 public static function getChild($name){
		return parent::getChild($name);
	 }

	/**
	 * Get all children
	 *
	 * @static
	 * @return array
	 */
	 public static function getChildren(){
		return parent::getChildren();
	 }

	/**
	 * Check if the object has children
	 *
	 * @static
	 * @return boolean
	 */
	 public static function hasChildren(){
		return parent::hasChildren();
	 }

	/**
	 * Check if a given element is after another sibling
	 *
	 * @static
	 * @param	integer|string $sibling The sibling

	 * @return boolean
	 */
	 public static function isAfter($sibling){
		return parent::isAfter($sibling);
	 }

	/**
	 * Nests an object withing the current object
	 *
	 * @static
	 * @param	Tag|string $element	An element name or an Tag
	 * @param	string	$value	The Tag's alias or the element's content
	 * @param	array	$attributes

	 * @return Tag
	 */
	 public static function nest($element, $value = null, $attributes = array()){
		return parent::nest($element, $value, $attributes);
	 }

	/**
	 * Nest an array of objects/values
	 *
	 * @static
	 * @param	array $children
	 */
	 public static function nestChildren($children){
		parent::nestChildren($children);
	 }

	/**
	 * Add an object to the current object
	 *
	 * @static
	 * @param	string|TreeObject	$child The child
	 * @param	string	$name	Its name

	 * @return TreeObject
	 */
	 public static function setChild($child, $name = null){
		return parent::setChild($child, $name);
	 }

 }
}

namespace  {
 class Typeahead extends Bootstrapper\Typeahead{
	/**
	 * Creates a new Typeahead instance.
	 *
	 * @static
	 * @param	array $source	Array of items for list
	 * @param	int	$items	Number of items to display
	 * @param	array $attributes An array of attributes to use

	 * @return Typeahead
	 */
	 public static function create($source, $items = 8, $attributes = array()){
		return parent::create($source, $items, $attributes);
	 }

 }
}

namespace  {
 class Typography extends Bootstrapper\Typography{
	/**
	 * 
	 *
	 * @static
	 */
	 public static function lead($message, $tag = 'p', $attributes = array()){
		parent::lead($message, $tag, $attributes);
	 }

	/**
	 * Create a new muted text.
	 *
	 * @static
	 * @param	string $message	Message in tag
	 * @param	array	$attributes Parent div attributes

	 * @return string Typography HTML
	 */
	 public static function muted($message, $tag = 'p', $attributes = array()){
		return parent::muted($message, $tag, $attributes);
	 }

	/**
	 * Create a new warning text.
	 *
	 * @static
	 * @param	string $message	Message in tag
	 * @param	array	$attributes Parent div attributes

	 * @return string Typography HTML
	 */
	 public static function warning($message, $tag = 'p', $attributes = array()){
		return parent::warning($message, $tag, $attributes);
	 }

	/**
	 * Create a new error text.
	 *
	 * @static
	 * @param	string $message	Message in tag
	 * @param	array	$attributes Parent div attributes

	 * @return string Typography HTML
	 */
	 public static function error($message, $tag = 'p', $attributes = array()){
		return parent::error($message, $tag, $attributes);
	 }

	/**
	 * Create a new info text.
	 *
	 * @static
	 * @param	string $message	Message in tag
	 * @param	array	$attributes Parent div attributes

	 * @return string Typography HTML
	 */
	 public static function info($message, $tag = 'p', $attributes = array()){
		return parent::info($message, $tag, $attributes);
	 }

	/**
	 * Create a new success text.
	 *
	 * @static
	 * @param	string $message	Message in tag
	 * @param	array	$attributes Parent div attributes

	 * @return string Typography HTML
	 */
	 public static function success($message, $tag = 'p', $attributes = array()){
		return parent::success($message, $tag, $attributes);
	 }

	/**
	 * Creates a definition list
	 *
	 * @static
	 * @param	array $list	An array [term => description]
	 * @param	array $attributes An array of attributes

	 * @return string A formatted <dl> list
	 */
	 public static function dl($list, $attributes = array()){
		return parent::dl($list, $attributes);
	 }

	/**
	 * Creates an horizontal definition list
	 *
	 * @static
	 * @param	array $list	An array [term => description]
	 * @param	array $attributes An array of attributes

	 * @return string A formatted <dl> list
	 */
	 public static function horizontal_dl($list, $attributes = array()){
		return parent::horizontal_dl($list, $attributes);
	 }

 }
}

namespace  {
 class Former extends Former\Former{
	/**
	 * Build a new Former instance
	 *
	 * @static
	 * @param	Illuminate\Container\Container $app
	 */
	 public static function __construct($app, $populator, $framework){
		parent::__construct($app, $populator, $framework);
	 }

	/**
	 * Acts as a router that redirects methods to all of Former classes
	 *
	 * @static
	 * @param	string $method	The method called
	 * @param	array	$parameters An array of parameters

	 * @return mixed
	 */
	 public static function __call($method, $parameters){
		return parent::__call($method, $parameters);
	 }

	/**
	 * Add values to populate the array
	 *
	 * @static
	 * @param	mixed $values Can be an Eloquent object or an array
	 */
	 public static function populate($values){
		parent::populate($values);
	 }

	/**
	 * Set the value of a particular field
	 *
	 * @static
	 * @param	string $field The field's name
	 * @param	mixed	$value Its new value
	 */
	 public static function populateField($field, $value){
		parent::populateField($field, $value);
	 }

	/**
	 * Get the value of a field
	 *
	 * @static
	 * @param	string $field The field's name
	 * @return mixed
	 */
	 public static function getValue($field, $fallback = null){
		return parent::getValue($field, $fallback);
	 }

	/**
	 * Fetch a field value from both the new and old POST array
	 *
	 * @static
	 * @param	string $name	A field name
	 * @param	string $fallback A fallback if nothing was found
	 * @return string
	 */
	 public static function getPost($name, $fallback = null){
		return parent::getPost($name, $fallback);
	 }

	/**
	 * Get the Populator binded to Former
	 *
	 * @static
	 * @return Populator
	 */
	 public static function getPopulator(){
		return parent::getPopulator();
	 }

	/**
	 * Set the errors to use for validations
	 *
	 * @static
	 * @param	Message $validator The result from a validation
	 */
	 public static function withErrors($validator = null){
		parent::withErrors($validator);
	 }

	/**
	 * Add live validation rules
	 *
	 * @static
	 * @param	array *$rules An array of Laravel rules
	 */
	 public static function withRules(){
		parent::withRules();
	 }

	/**
	 * Switch the framework used by Former
	 *
	 * @static
	 * @param	string $framework The name of the framework to use
	 */
	 public static function framework($framework = null){
		parent::framework($framework);
	 }

	/**
	 * Get the current framework
	 *
	 * @static
	 * @return FrameworkInterface
	 */
	 public static function getFramework(){
		return parent::getFramework();
	 }

	/**
	 * Get a class out of the Contaienr
	 *
	 * @static
	 * @param	string $dependency The class

	 * @return object
	 */
	 public static function getContainer($dependency = null){
		return parent::getContainer($dependency);
	 }

	/**
	 * Get an option from the config
	 *
	 * @static
	 * @param	string $option	The option
	 * @param	mixed $default Optional fallback

	 * @return mixed
	 */
	 public static function getOption($option, $default = null){
		return parent::getOption($option, $default);
	 }

	/**
	 * Closes a form
	 *
	 * @static
	 * @return string A form closing tag
	 */
	 public static function close(){
		return parent::close();
	 }

	/**
	 * Get the errors for the current field
	 *
	 * @static
	 * @param	string $name A field name
	 * @return string
	 */
	 public static function getErrors($name = null){
		return parent::getErrors($name);
	 }

	/**
	 * Get a rule from the Rules array
	 *
	 * @static
	 * @param	string $name The field to fetch
	 * @return array
	 */
	 public static function getRules($name){
		return parent::getRules($name);
	 }

	/**
	 * Returns the current Form
	 *
	 * @static
	 * @return Form
	 */
	 public static function form(){
		return parent::form();
	 }

	/**
	 * Get the current field instance
	 *
	 * @static
	 * @return Field
	 */
	 public static function field(){
		return parent::field();
	 }

 }
}

namespace  {
 class HTML extends LaravelBook\Laravel4Powerpack\HTML{
	/**
	 * Build a new instance of HTML
	 *
	 * @static
	 * @param	UrlGenerator $urlGenerator
	 */
	 public static function __construct($urlGenerator = null){
		parent::__construct($urlGenerator);
	 }

	/**
	 * Register a new macro with the HTML class
	 *
	 * @static
	 * @param	string	$name	Its name
	 * @param	Callable $callback A closure to use

	 */
	 public static function macro($name, $callback){
		parent::macro($name, $callback);
	 }

	/**
	 * Convert HTML characters to HTML entities
	 * 
	 * The encoding in $encoding will be used
	 *
	 * @static
	 * @param	string $value
	 * @return string
	 */
	 public static function entities($value){
		return parent::entities($value);
	 }

	/**
	 * Convert HTML entities to HTML characters
	 * 
	 * The encoding in $encoding will be used
	 *
	 * @static
	 * @param	string $value
	 * @return string
	 */
	 public static function decode($value){
		return parent::decode($value);
	 }

	/**
	 * Wraps opening and closing HTML tags around the given input.
	 *
	 * @static
	 * @param	string $value
	 * @param	string $tag
	 * @return string
	 */
	 public static function wrapHTMLTag($value, $tag){
		return parent::wrapHTMLTag($value, $tag);
	 }

	/**
	 * Convert HTML special characters
	 * 
	 * The encoding in $encoding will be used
	 *
	 * @static
	 * @param	string $value
	 * @return string
	 */
	 public static function specialchars($value){
		return parent::specialchars($value);
	 }

	/**
	 * Generate a link to a JS file
	 *
	 * @static
	 * @param	string $url
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function script($url, $attributes = array()){
		return parent::script($url, $attributes);
	 }

	/**
	 * Generate a link to a CSS file.
	 * 
	 * If no media type is selected, "all" will be used
	 *
	 * @static
	 * @param	string $url
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function style($url, $attributes = array()){
		return parent::style($url, $attributes);
	 }

	/**
	 * Generate a HTML span
	 *
	 * @static
	 * @param	string $value
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function span($value, $attributes = array()){
		return parent::span($value, $attributes);
	 }

	/**
	 * Generate a HTML link
	 *
	 * @static
	 * @param	string $url
	 * @param	string $title
	 * @param	array	$attributes
	 * @param	bool	$https
	 * @return string
	 */
	 public static function to($url, $title = null, $attributes = array(), $parameters = array(), $https = null){
		return parent::to($url, $title, $attributes, $parameters, $https);
	 }

	/**
	 * Generate a HTTPS HTML link
	 *
	 * @static
	 * @param	string $url
	 * @param	string $title
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function secure($url, $title = null, $parameters = array(), $attributes = array()){
		return parent::secure($url, $title, $parameters, $attributes);
	 }

	/**
	 * Generate a HTML link to an asset
	 *
	 * @static
	 * @param	string $url
	 * @param	string $title
	 * @param	array	$attributes
	 * @param	bool	$https
	 * @return string
	 */
	 public static function asset($url, $title = null, $attributes = array(), $https = null){
		return parent::asset($url, $title, $attributes, $https);
	 }

	/**
	 * Generate a HTTPS HTML link to an asset
	 *
	 * @static
	 * @param	string $url
	 * @param	string $title
	 * @param	array	$attributes
	 * @param	bool	$https
	 * @return string
	 */
	 public static function secureAsset($url, $title = null, $attributes = array()){
		return parent::secureAsset($url, $title, $attributes);
	 }

	/**
	 * Generate a HTML link to a route
	 * 
	 * An array of parameters may be specified to fill in URI segment wildcards.
	 *
	 * @static
	 * @param	string $name
	 * @param	string $title
	 * @param	array	$parameters
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function route($name, $title = null, $parameters = array(), $attributes = array(), $absolute = true){
		return parent::route($name, $title, $parameters, $attributes, $absolute);
	 }

	/**
	 * Generate a HTML link to a controller action
	 * 
	 * An array of parameters may be specified to fill in URI segment wildcards.
	 *
	 * @static
	 * @param	string $action
	 * @param	string $title
	 * @param	array	$parameters
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function action($action, $title = null, $parameters = array(), $attributes = array(), $absolute = true){
		return parent::action($action, $title, $parameters, $attributes, $absolute);
	 }

	/**
	 * Generate an HTML mailto link.
	 * 
	 * The E-Mail address will be obfuscated to protect it from spam bots.
	 *
	 * @static
	 * @param	string $email
	 * @param	string $title
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function mailto($email, $title = null, $attributes = array()){
		return parent::mailto($email, $title, $attributes);
	 }

	/**
	 * Obfuscate an e-mail address to prevent spam-bots from sniffing it.
	 *
	 * @static
	 * @param	string $email
	 * @return string
	 */
	 public static function email($email){
		return parent::email($email);
	 }

	/**
	 * Generate an HTML image element.
	 *
	 * @static
	 * @param	string $url
	 * @param	string $alt
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function image($url, $alt = null, $attributes = array()){
		return parent::image($url, $alt, $attributes);
	 }

	/**
	 * Generate an ordered list of items.
	 *
	 * @static
	 * @param	array	$list
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function ol($list, $attributes = array()){
		return parent::ol($list, $attributes);
	 }

	/**
	 * Generate an un-ordered list of items.
	 *
	 * @static
	 * @param	array	$list
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function ul($list, $attributes = array()){
		return parent::ul($list, $attributes);
	 }

	/**
	 * Generate a definition list.
	 *
	 * @static
	 * @param	array	$list
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function dl($list, $attributes = array()){
		return parent::dl($list, $attributes);
	 }

	/**
	 * Build a list of HTML attributes from an array
	 *
	 * @static
	 * @param	array	$attributes
	 * @return string
	 */
	 public static function attributes($attributes){
		return parent::attributes($attributes);
	 }

	/**
	 * 
	 *
	 * @static
	 */
	 public static function getUrlGenerator(){
		parent::getUrlGenerator();
	 }

	/**
	 * Dynamically handle calls to custom macros.
	 *
	 * @static
	 * @param	string	$method
	 * @param	array	$parameters

	 * @return mixed
	 */
	 public static function __call($method, $parameters){
		return parent::__call($method, $parameters);
	 }

 }
}

