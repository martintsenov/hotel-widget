<?php

namespace App\Tests\Service;

use App\Service\HotelWidget;
use PHPUnit\Framework\TestCase;

class HotelWidgetTest extends TestCase
{
    /**
     * @covers HotelWidget::getAverageScoreById
     * @dataProvider getAverageScoreByIdProvider
     */
    public function test_getAverageScoreById_Success($getAverageScoreByIdResult, $expected)
    {
        $service = new HotelWidget($this->getHotelRepositoryMock($getAverageScoreByIdResult));
        $result = $service->getAverageScoreById(1);
        $this->assertEquals($expected, $result);
    }
    
    public function getAverageScoreByIdProvider()
    {
        return [
            [
                [
                    [
                        'id' => 1,
                        'name' => 'hotel name',
                        'average_rating' => 89.00,
                    ],
                ],
                [
                    'id' => 1,
                    'name' => 'hotel name',
                    'average_rating' => 89,
                ],
            ],
            [
                [
                    [
                        'id' => 2,
                        'name' => 'hotel name new',
                        'average_rating' => 92,
                    ],
                ],
                [
                    'id' => 2,
                    'name' => 'hotel name new',
                    'average_rating' => 92,
                ],
            ],
        ];
    }

    /**
     * @covers HotelWidget::getAverageScoreById
     * @expectedException App\Exception\NoResultException
     */
    public function test_getAverageScoreById_Throw_Exception()
    {
        $service = new HotelWidget($this->getHotelRepositoryMock([]));
        $service->getAverageScoreById(1);
    }
    
    /**
     * Build mock for App\Repository\HotelRepository
     *
     * @param mixed $getAverageScoreByIdResult
     * @return type
     */
    private function getHotelRepositoryMock($getAverageScoreByIdResult)
    {
        $repositoryMock = $this->getMockBuilder('App\Repository\HotelRepository')
            ->disableOriginalConstructor()
            ->setMethods(['getAverageScoreById'])
            ->getMock();
        $repositoryMock->expects($this->any())
            ->method('getAverageScoreById')
            ->will($this->returnValue($getAverageScoreByIdResult));
        
        return $repositoryMock;
    }
}
