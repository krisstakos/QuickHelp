package com.example.krist.hackaton2;

import android.annotation.SuppressLint;
import android.support.v4.app.NotificationCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.webkit.CookieManager;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;
import android.content.pm.ActivityInfo;
import android.view.KeyEvent;
import android.view.Window;
import android.view.WindowManager;


public class MainActivity extends AppCompatActivity {
    private WebView mWebView;
    @SuppressLint("SetJavaScriptEnabled")

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        getWindow().requestFeature(Window.FEATURE_NO_TITLE);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        CookieManager.getInstance().setAcceptCookie(true);
        mWebView=(WebView)findViewById(R.id.webview);
        mWebView.getSettings().setDomStorageEnabled(true);
        mWebView.getSettings().setJavaScriptEnabled(true);
       // mWebView.loadUrl("file:///android_asset/index.html");
        mWebView.loadUrl("http://192.168.0.102/");
        mWebView.setWebViewClient(new MainActivityClient());

    }
    private class MainActivityClient extends WebViewClient {
        @Override
        public boolean shouldOverrideUrlLoading(WebView webview, String url){
            webview.loadUrl(url);
            return true;
        }
    }
    @Override
    public boolean onKeyDown(int keyCode, KeyEvent event){
        if((keyCode==KeyEvent.KEYCODE_BACK) && mWebView.canGoBack()){
            mWebView.goBack();
            return true;
        }
        return super.onKeyDown(keyCode, event);
    }
}



