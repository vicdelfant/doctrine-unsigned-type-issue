# [doctrine/dbal#3286](https://github.com/doctrine/dbal/issues/3286) test case
### Preparation
1. Create a local MySQL database (`doctrine_unsigned_testcase` for example).
2. Check/update connection details in `config/cli-config.php`.

### Steps to reproduce
1. `bin/doctrine orm:schema-tool:create`
2. `bin/doctrine orm:schema-tool:update --dump-sql`

### Expected result
`bin/doctrine orm:schema-tool:create` generates the database structure, but `orm:schema-tool:update` does not generate any subsequent changes. 

### Actual result
`bin/doctrine orm:schema-tool:update --dump-sql` generates a "false positive" change due to our custom ID:
```
 The following SQL statements will be executed:

     ALTER TABLE TestEntity CHANGE id id BIGINT UNSIGNED NOT NULL COMMENT '(DC2Type:custom_id)';
 ```