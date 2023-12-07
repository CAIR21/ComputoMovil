package com.CAIR.fic.Ui;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import com.CAIR.fic.R;
import com.google.android.exoplayer2.MediaItem;
import com.google.android.exoplayer2.SimpleExoPlayer;
import com.google.android.exoplayer2.source.MediaSource;
import com.google.android.exoplayer2.source.ProgressiveMediaSource;
import com.google.android.exoplayer2.ui.PlayerView;
import com.google.android.exoplayer2.upstream.DataSource;
import com.google.android.exoplayer2.upstream.DefaultHttpDataSource;

public class ReproductorActivity extends AppCompatActivity {
    private SimpleExoPlayer player;
    private PlayerView playerView;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_reproductor);

        playerView = findViewById(R.id.reproductorVideo);

        Intent intent = getIntent();
        if (intent != null) {
            String urlPelicula = intent.getStringExtra("urlPelicula");
            if (urlPelicula != null && !urlPelicula.isEmpty()) {
                iniciarReproduccion(urlPelicula);
            }
        }
    }

    private void iniciarReproduccion(String urlPelicula) {
        hideSystemUi();

        player = new SimpleExoPlayer.Builder(this).build();
        playerView.setPlayer(player);

        DataSource.Factory dataSourceFactory = new DefaultHttpDataSource.Factory();
        MediaSource videoSource = new ProgressiveMediaSource.Factory(dataSourceFactory)
                .createMediaSource(MediaItem.fromUri(Uri.parse(urlPelicula)));

        player.setMediaSource(videoSource);
        player.prepare();
        player.setPlayWhenReady(true);
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
        if (player != null) {
            player.release();
        }
    }

    private void hideSystemUi() {
        playerView.setSystemUiVisibility(
                View.SYSTEM_UI_FLAG_LOW_PROFILE
                        | View.SYSTEM_UI_FLAG_FULLSCREEN
                        | View.SYSTEM_UI_FLAG_LAYOUT_STABLE
                        | View.SYSTEM_UI_FLAG_IMMERSIVE_STICKY
                        | View.SYSTEM_UI_FLAG_LAYOUT_HIDE_NAVIGATION
                        | View.SYSTEM_UI_FLAG_HIDE_NAVIGATION
        );
    }
}
