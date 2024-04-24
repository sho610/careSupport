$(document).ready(function() {
  // var accessToken = 'IGQWROM19OZAVE4TWtMcXBtNHpJeWNTaW9PX09nQ0QxSlZAVUlIyT19DWkdMU01NeFBleGF0NGtnQ1luSE00MHNCMzhmaVFKOVV1WmpsU0xTMXV1QzlBOUtRU0w3TmdEdUFtMk9qYm9hSDg5ZAwZDZD'; // ここに自分のアクセストークンを入力してください
  var userId = '7270083559695176'; // ここに自分のユーザーIDを入力してください
  var count = 9; // 表示する投稿の数
  var accessToken;
  var lastTokenUpdate;

  // テキストファイルからアクセストークンと最終更新日時を読み込む関数
  function readAccessTokenFromFile(callback) {
    $.ajax({
      url: 'access_token.txt', // テキストファイルのパス
      dataType: 'text',
      success: function(data) {
          var lines = data.trim().split('\n');
          accessToken = lines[0].trim();
          lastTokenUpdate = new Date(lines[1].trim());
          callback();
      },
      error: function(error) {
          console.error('アクセストークンの読み込み中にエラーが発生しました。', error);
          $('.insta-img-list').html('アクセストークンの読み込み中にエラーが発生しました。');
      }
    });
  }

  // テキストファイルにアクセストークンと最終更新日時を書き込む関数
  function writeAccessTokenToFile(token, updateDate) {
    var fileContent = token + '\n' + updateDate.toISOString();
    $.ajax({
      url: 'write_access_token.php', // PHPスクリプトのパス
      type: 'POST',
      data: {
          fileContent: fileContent
      },
      success: function() {
          console.log('アクセストークンをファイルに書き込みました。');
      },
      error: function(error) {
          console.error('アクセストークンの書き込み中にエラーが発生しました。', error);
      }
    });
  }

  function getInstagramPosts(accessToken, userId, count) {
    var apiUrl = 'https://graph.instagram.com/v13.0/' + userId +
      '/media?fields=id,media_type,media_url,permalink,timestamp&access_token=' + accessToken +
      '&limit=' + count;

  
    $.ajax({
        url: apiUrl,
        type: 'GET',
        success: function(response) {
            var posts = response.data;
            console.log(posts.length)
            if (posts && posts.length > 0) {
                for (var i = 0; i < posts.length; i++) {
                    var post = posts[i];
                    if (post.media_type === 'IMAGE') {
                        var image = '<li class="insta-list-item">' +
                            '<a href="' + post.permalink + '" target="_blank">' +
                            '<img src="' + post.media_url + '" alt="Instagram Image">' +
                            '</a>' +
                            '</li>';
                        $('.insta-img-list').append(image);
                    }
                }
            } else {
                $('.insta-img-list').html('投稿が見つかりませんでした。');
            }
        },
        error: function(error) {
            $('.insta-img-list').html('エラーが発生しました。');
            console.error(error);
        }
    });
  }

  // ページ読み込み時にテキストファイルからアクセストークンを読み込み
  readAccessTokenFromFile(function() {
    var now = new Date();
    var diffInMs = now - lastTokenUpdate;
    var diffInDays = diffInMs / (1000 * 60 * 60 * 24);

    // 最終更新日時から1か月以上経過していたらアクセストークンを更新
    if (diffInDays >= 30) {
        updateAccessToken();
    } else {
        // 1か月未満だった場合はそのままアクセストークンを使って投稿を取得
        getInstagramPosts(accessToken, userId, count);
    }
  });

  // アクセストークンを更新する関数
  function updateAccessToken() {
      $.ajax({
          url: 'https://graph.instagram.com/refresh_access_token',
          type: 'GET',
          data: {
              grant_type: 'ig_refresh_token',
              access_token: accessToken
          },
          success: function(response) {
              var newAccessToken = response.access_token;
              accessToken = newAccessToken;
              // 新しいアクセストークンと現在時刻をテキストファイルに書き込み
              writeAccessTokenToFile(newAccessToken, new Date());
              // 新しいアクセストークンを使って投稿を取得
              getInstagramPosts(newAccessToken, userId, count);
          },
          error: function(error) {
              console.error('アクセストークンの更新中にエラーが発生しました。', error);
              $('.insta-img-list').html('アクセストークンの更新中にエラーが発生しました。');
          }
      });
  }
    
});



// ↓↓↓↓↓↓↓↓↓↓↓↓↓↓アクセストークン自動更新できる？↓↓↓↓↓↓↓↓↓↓↓↓↓↓



// // Instagramの認証情報
// var clientId = '1451951322089927'; // アプリケーションのクライアントID
// var redirectUri = 'https://csurara.com/'; // コールバックURL

// // ユーザーをInstagramの認証画面にリダイレクト
// function authenticateUser() {
//   var authUrl = 'https://api.instagram.com/oauth/authorize/?client_id=' + clientId +
//     '&redirect_uri=' + redirectUri +
//     '&response_type=code';

//   window.location.href = authUrl;
// }

// // コールバックURLで受け取った認証コードを使ってアクセストークンを取得
// function exchangeCodeForToken(code, callback) {
//   var tokenUrl = 'https://api.instagram.com/oauth/access_token';
//   $.ajax({
//     url: tokenUrl,
//     type: 'POST',
//     data: {
//       client_id: clientId,
//       client_secret: '4f6731483dbb583d9b5d7a6b759d1809', // アプリケーションのクライアントシークレット
//       redirect_uri: redirectUri,
//       code: code,
//       grant_type: 'authorization_code'
//     },
//     success: function(response) {
//       var accessToken = response.access_token;
//       callback(accessToken);
//     },
//     error: function(error) {
//       console.error('Failed to exchange code for token:', error);
//       // エラー処理を行う場合はここに追加
//     }
//   });
// }


// function updatePosts(newAccessToken) {
//   var userId = '7270083559695176'; // ここに自分のユーザーIDを入力してください
//   var count = 9; // 表示する投稿の数

//   var apiUrl = 'https://graph.instagram.com/v13.0/' + userId +
//       '/media?fields=id,media_type,media_url,permalink,timestamp&access_token=' + accessToken +
//       '&limit=' + count;
      
//   $.ajax({
//       url: apiUrl,
//       type: 'GET',
//       success: function(response) {
//           var posts = response.data;
//           console.log(posts.length)
//           if (posts && posts.length > 0) {
//               for (var i = 0; i < posts.length; i++) {
//                   var post = posts[i];
//                   if (post.media_type === 'IMAGE') {
//                       var image = '<li class="insta-list-item">' +
//                           '<a href="' + post.permalink + '" target="_blank">' +
//                           '<img src="' + post.media_url + '" alt="Instagram Image">' +
//                           '</a>' +
//                           '</li>';
//                       $('.insta-img-list').append(image);
//                   }
//               }
//           } else {
//               $('.insta-img-list').html('投稿が見つかりませんでした。');
//           }
//       },
//       error: function(error) {
//           $('.insta-img-list').html('エラーが発生しました。');
//           console.error(error);
//       }
//   });
// }

// // URLからクエリパラメータを取得する関数
// function getQueryParam(name) {
//   name = name.replace(/[\[\]]/g, '\\$&');
//   var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
//       results = regex.exec(window.location.href);
//   if (!results) return null;
//   if (!results[2]) return '';
//   return decodeURIComponent(results[2].replace(/\+/g, ' '));
// }

// function renewAccessToken(currentAccessToken, callback) {
//   authenticateUser(); // ユーザーを認証画面にリダイレクト

//   // ユーザーが認証し、コールバックURLで認証コードを取得した後の処理
//   // ここでは疑似的に認証コード 'AUTH_CODE_FROM_CALLBACK' を使ってアクセストークンを取得しています
//   var authCode = getQueryParam('code');
//   exchangeCodeForToken(authCode, function(newAccessToken) {
//     callback(newAccessToken);
//   });
// }

// $(document).ready(function() {
//   var accessToken = 'IGQWROM19OZAVE4TWtMcXBtNHpJeWNTaW9PX09nQ0QxSlZAVUlIyT19DWkdMU01NeFBleGF0NGtnQ1luSE00MHNCMzhmaVFKOVV1WmpsU0xTMXV1QzlBOUtRU0w3TmdEdUFtMk9qYm9hSDg5ZAwZDZD'; // ここに自分のアクセストークンを入力してください

//   // 初回はトークンを更新して投稿を表示
//   renewAccessToken(accessToken, function(newAccessToken) {
//     accessToken = newAccessToken;
//     updatePosts(accessToken);
//   });

//   // 1時間ごとにトークンを更新して投稿を更新
//   setInterval(function() {
//     renewAccessToken(accessToken, function(newAccessToken) {
//       accessToken = newAccessToken;
//       updatePosts(accessToken);
//     });
//   }, 60 * 60 * 1000); // 1時間ごとに実行

// });