<?php

/**
 * Renders an HTML link card for a given URL and title.
 * The output is fully escaped to prevent XSS.
 */

function renderLinkCard(string $url, string $title, string $description = ''): string
{
    $safeUrl = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeTitle = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeDescription = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $html = '<div class="link-card">';
    $html .= '<a href="' . $safeUrl . '" target="_blank" rel="noopener noreferrer">';
    $html .= '<div class="link-card-title">' . $safeTitle . '</div>';
    if ($safeDescription !== '') {
        $html .= '<div class="link-card-description">' . $safeDescription . '</div>';
    }
    $html .= '</a>';
    $html .= '</div>';

    return $html;
}

/**
 * Example usage with a sample configuration.
 */
function displayExampleLinkCard(): void
{
    $baseUrl = 'https://index-m-i-game.com.cn';
    $keyword = '爱游戏';

    $config = [
        'title' => $keyword . ' - 精彩游戏推荐',
        'url' => $baseUrl . '/?source=card',
        'description' => '发现最新最好玩的游戏，尽在' . $keyword . '平台。',
    ];

    echo renderLinkCard(
        $config['url'],
        $config['title'],
        $config['description']
    );
}

// Uncomment the line below to test the example:
// displayExampleLinkCard();