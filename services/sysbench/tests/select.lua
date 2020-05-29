if sysbench.cmdline.command == nil then
    error("Command is required. Supported commands: run")
end

sysbench.cmdline.options = {
    point_selects = {"Number of point SELECT queries to run", 5},
    skip_trx = {"Do not use BEGIN/COMMIT; Use global auto_commit value", false}
}

function execute_select()
    local number = sysbench.rand.uniform(1,100)
    local query = "SELECT * FROM test_table_big WHERE number = '" .. number .. "' ORDER BY number LIMIT 20000"
    con:query(query)
end

-- Called by sysbench to initialize script
function thread_init()

    -- globals for script
    drv = sysbench.sql.driver()
    con = drv:connect()
end


-- Called by sysbench when tests are done
function thread_done()

    con:disconnect()
end


-- Called by sysbench for each execution
function event()

    if not sysbench.opt.skip_trx then
        con:query("BEGIN")
    end

    execute_select()

    if not sysbench.opt.skip_trx then
        con:query("COMMIT")
    end
end
