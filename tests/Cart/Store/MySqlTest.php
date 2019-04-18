<?php


namespace Cart\Store;

use Exception;
use PDO;
use PDOStatement;
use PHPUnit\Framework\TestCase;

class MySqlTest extends TestCase
{
    public function testConstructorWithPDO()
    {
        $pdoMock = $this->createMock(PDO::class);

        $store = new MySql($pdoMock);
        $this->assertInstanceOf(MySql::class, $store);
    }

    public function testFindExecuteReturnFalse()
    {
        $this->expectException(Exception::class);

        $stmtMock = $this->getPDOStmtMock();
        $stmtMock->expects($this->once())->method('execute')->willReturn(false);

        $pdoMock = $this->getPDOMock($stmtMock);

        $store = new MySql($pdoMock);
        $store->find(87);
    }

    /**
     * @param $pdoStmt
     * @return \PHPUnit\Framework\MockObject\MockObject
     * @throws \ReflectionException
     */
    protected function getPDOMock($pdoStmt)
    {
        $pdo = $this->getMockBuilder(PDO::class)
            ->disableOriginalConstructor()
            ->setMethods(['prepare'])
            ->getMock();

        $pdo->method('prepare')->willReturn($pdoStmt);

        return $pdo;
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject
     * @throws \ReflectionException
     */
    protected function getPDOStmtMock()
    {
        return $this->getMockBuilder(PDOStatement::class)
            ->setMethods(['execute', 'fetch', 'fetchAll'])
            ->getMock();
    }

}
